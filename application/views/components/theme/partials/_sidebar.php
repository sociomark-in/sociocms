<nav class="sidebar">
	<div class="sidebar-header">
		<a href="#" class="sidebar-brand">
			<img src="<?= base_url('assets/logo.png') ?>" alt="" width="160">
		</a>
		<div class="sidebar-toggler not-active">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="sidebar-body">
		<ul class="nav">
			<li class="nav-item <?= link_is_active("") ?>">
				<a href="<?= base_url() ?>" class="nav-link">
					<i class="link-icon" data-feather="box"></i>
					<span class="link-title">Dashboard</span>
				</a>
			</li>

			<li class="nav-item nav-category">Posts Management</li>
			<!-- Blogs -->
			<li class="nav-item <?= link_is_active("posts") ?>">
				<a class="nav-link" data-bs-toggle="collapse" href="#blogs_articles" role="button" aria-expanded="false" aria-controls="blogs_articles">
					<i class="link-icon" data-feather="database"></i>
					<span class="link-title">Blog Posts</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="blogs_articles">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="<?= base_url('posts/all-blogs') ?>" class="nav-link <?= link_is_active("posts/all-blogs") ?>">
								<span class="link-title">All Posts</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('posts/blogs/new') ?>" class="nav-link <?= link_is_active("posts/blogs/new") ?>">
								<span class="link-title">New Post</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('posts/blogs/all-categories') ?>" class="nav-link <?= link_is_active("posts/blogs/all-categories") ?>">
								<span class="link-title">All Categories</span>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="<?= base_url('posts/blogs/all-comments') ?>" class="nav-link <?= link_is_active("posts/blogs/all-comments") ?>">
								<span class="link-title">All Comments</span>
							</a>
						</li> -->
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#press_articles" role="button" aria-expanded="false" aria-controls="press_articles">
					<i class="link-icon" data-feather="database"></i>
					<span class="link-title">Press Releases</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="press_articles">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="<?= base_url('') ?>" class="nav-link">
								<span class="link-title">All Articles</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('') ?>" class="nav-link">
								<span class="link-title">All Categories</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			

			<!-- Blogs -->
			<li class="nav-item nav-category">Content Management</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#testimonials" role="button" aria-expanded="false" aria-controls="testimonials">
					<i class="link-icon" data-feather="message-circle"></i>
					<span class="link-title">Testimonials</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="testimonials">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="#" class="nav-link">Text Testimonials</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">YouTube Testimonials</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item <?= link_is_active("locations") ?>">
				<a class="nav-link" data-bs-toggle="collapse" href="#locations" role="button" aria-expanded="false" aria-controls="locations">
					<i class="link-icon" data-feather="map-pin"></i>
					<span class="link-title">Locations</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="locations">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="<?= base_url('locations') ?>" class="nav-link  <?= link_is_active("locations") ?>">All Locations</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#cm_article" role="button" aria-expanded="false" aria-controls="cm_article">
					<i class="link-icon" data-feather="file"></i>
					<span class="link-title">Clinical Manuscripts</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="cm_article">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="<?= base_url('') ?>" class="nav-link">
								<span class="link-title">All Manuscripts</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!-- Access Level: admin -->

			<li class="nav-item nav-category">User Management</li>
			<!-- <li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
					<i class="link-icon" data-feather="users"></i>
					<span class="link-title">Jury Panel</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="emails">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="#" class="nav-link">Juries</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Menu Items</a>
						</li>
					</ul>
				</div>
			</li> -->

			<li class="nav-item">
				<a href="dashboard.html" class="nav-link">
					<i class="link-icon" data-feather="users"></i>
					<span class="link-title">Users</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="dashboard.html" class="nav-link">
					<i class="link-icon" data-feather="settings"></i>
					<span class="link-title">Settings</span>
				</a>
			</li>

			<li class="nav-item nav-category">Apps</li>
			<li class="nav-item">
				<a href="dashboard.html" class="nav-link">
					<i class="link-icon" data-feather="settings"></i>
					<span class="link-title">App Settings</span>
				</a>
			</li>

			<li class="nav-item nav-category">Docs</li>
			<li class="nav-item">
				<a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
					<i class="link-icon" data-feather="hash"></i>
					<span class="link-title">Documentation</span>
				</a>
			</li>
		</ul>
	</div>
</nav>
