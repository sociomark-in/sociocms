<?php

class BlogsController extends CI_Controller
{
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data/BlogsModel');
		$this->load->model('data/AuthorsModel');
		$this->data = null;
	}

	/* Get All Categories */
	public function api_category_get()
	{
	}
	/* Get Single Category */
	public function api_category_get_single()
	{
	}
	public function api_category_insert()
	{
		$form_data = $this->input->post();
		$data = $form_data;
		$this->load->model('blogposts/CategoryModel');
		if ($this->CategoryModel->insert($data)) {
			redirect($this->input->get_request_header('Referer'));
		}
	}
	public function api_category_update()
	{
		$form_data = $this->input->post();
		$data = $form_data;
		$this->load->model('blogposts/CategoryModel');
		if ($this->CategoryModel->insert($data)) {
			redirect($this->input->get_request_header('Referer'));
		}
	}
	public function api_tag_insert()
	{
		$form_data = $this->input->post();
		$data = $form_data;
		$tag = slugify($form_data['title']);
		$data['uslug'] = $tag;
		$this->load->model('blogposts/TagModel');
		if ($this->TagModel->insert($data)) {
			redirect($this->input->get_request_header('Referer'));
		}
	}

	public function home()
	{
		$blogs = json_decode($this->BlogsModel->get_all(['title', 'author_id', 'category', 'tags', 'created_at', 'uslug', 'views', 'status']), true);
		for ($i = 0; $i < count($blogs); $i++) {
			if (isset($blogs[$i]['created_at'])) {
				$d = date_create_from_format("Y-m-d H:i:s", $blogs[$i]['created_at']);
				$blogs[$i]['created_at'] = date_format($d, "F j, Y");
			}
			if (isset($blogs[$i]['status'])) {
				switch ($blogs[$i]['status']) {
					case 0:
						$blogs[$i]['status'] = "Unpublished";
						break;
					case 1:
						$blogs[$i]['status'] = "Published";
						break;
					case 2:
						$blogs[$i]['status'] = "Draft";
						break;
					case 3:
						$blogs[$i]['status'] = "Archived";
						break;

					default:
						$blogs[$i]['status'] = "Draft";
						break;
				}
			}
		}
		$this->data['blogs_all'] = $blogs;
		$this->load->admin_dashboard('blogs/home', $this->data);
	}


	public function new_post()
	{
		$this->load->admin_dashboard('blogs/new', $this->data);
	}

	// INSERT INTO `cms_posts`(`id`, `title`, `content`, `excerpt`, `image_url`, `category`, `tags`, `seo_title`, `seo_desc`, `seo_thumb`, `author_id`, `created_at`, `updated_at`, `uslug`, `views`, `status`)

	public function edit($slug)
	{
		$this->load->admin_dashboard('blogs/edit', $this->data);
	}

	public function categories()
	{
		$this->load->model('blogposts/CategoryModel');
		$this->load->model('blogposts/TagModel');
		$this->data['categories'] = $this->CategoryModel->get();
		$this->data['tags'] = $this->TagModel->get();
		// print_r($this->data['tags']);die;
		$this->load->admin_dashboard('blogs/categories', $this->data);
	}
}
