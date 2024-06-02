<?php
	class MainContent {
		public function render() {
			echo '
			<div id="main">
				<article class="post featured">
					<header class="major">
						<h2><a href="#">And this is a<br />SHOP</a></h2>
					</header>
					<a href="#" class="image main"><img src="./images/pic001.jpg" alt="" /></a>
					<ul class="actions special">
						<li><a href="#" class="button large">buy</a></li>
					</ul>
				</article>
				<section class="posts">
					' . $this->renderPosts() . '
				</section>
			</div>
			';
		}

		private function renderPosts() {
			require_once './classes/posts.php';

			$posts = new Posts();

			$html = '';
			
			foreach ($posts->get_posts() as $post) {
				$html .= '

				<article>
					<header>
						<span class="date">' . $post["type"] . '</span>
						<h2><a href="#">' . $post["title"] . '</a></h2>
					</header>
					<a href="#" class="image fit"><img src="images/' . $post["image"] . '" alt="" /></a>
					<p>' . $post["description"] . '</p>
					<ul class="actions special">
						<li><a href="#" class="button">Buy</a></li>
					</ul>
				</article>
				';
			}

			return $html;
		}
	}
?>