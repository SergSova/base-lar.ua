<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 14.03.2018
 * Time: 12:00
 */

namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class BlogController extends Controller {


	public function index( $category = NULL ) {
		$model = Blog::find( 10 );
		/** @var Collection $allPosts */
		$allPosts = Post::where( 'published', 1 )->orderBy( 'publishedOn', 'desc' )->get();
		if ( $category ) {
			$allPosts = $allPosts->where( 'category_id', $category->id );
		}
		$big        = $allPosts->filter(
			function ( $post, $key ) {
				return $post->isBig;
			}
		);
		$violets    = $allPosts->filter(
			function ( $post, $key ) {
				return $post->isVioletPostStyle && ! $post->isBig;
			}
		);
		$otherPosts = $allPosts->filter(
			function ( $post, $key ) {
				return ! $post->isVioletPostStyle && ! $post->isBig;
			}
		);

		$posts = collect();
		$count = $allPosts->count();
		/*for ($i = 1; $i <= $count; $i++) {

		}*/

		$i = 1;
		while ( $otherPosts->count() || $big->count() || $violets->count() ) {
			if ( ( $i == 3 || ( $i - 3 ) % 5 == 0 ) && $violets->count() ) {
				$posts->push( $violets->shift() );
			} elseif ( ( $i == 1 || ( $i - 1 ) % 3 == 0 ) && $big->count() ) {
				$posts->push( $big->shift() );
			} elseif ( $otherPosts->count() ) {
				$posts->push( $otherPosts->shift() );
			} else {
				$i ++;
				continue;
			}
			$i ++;
		}


		for ( $i = 1; $i <= $count; $i ++ ) {
			if ( count( $posts ) ) {
				$arr[0][] = $posts->shift();
			}
			if ( count( $posts ) ) {
				$arr[1][] = $posts->shift();
			}
			if ( count( $posts ) ) {
				$arr[2][] = $posts->shift();
			}
		}

		if ( isset( $arr[2] ) && is_array( $arr[2] ) && count( $arr[2] ) == count( $arr[0] ) ) {
			array_push( $arr[0], array_pop( $arr[2] ) );
		}

		return view( 'blog.index' )->with( compact( 'model', 'posts', 'arr' ) );
//        return view('blog.test')->with(compact('model', 'posts'));
	}


	public function view( $category = NULL, $model = NULL ) {
		if ( ! $category || ! $model ) {
			return redirect()->back();
		}

		/** @var Post $model */
		$model->viewers += 1;
		$model->save();

		$next = Post::where( 'id', '<>', $model->id )->where( 'published', 1 )->limit( 1 )->first();
		$prev = Post::where( 'id', '<>', $model->id )->where( 'published', 1 )->where( 'id', '<>', $next->id )->limit( 1 )->first();

		$morePosts = Post::where( 'id', '<>', $model->id )->where( 'published', 1 )->limit(10)->get();

		return view( 'blog.one_post' )->with( compact( 'model', 'category', 'next', 'prev', 'morePosts' ) );
	}

}