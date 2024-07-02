<?php
require_once APPPATH . "controllers/base/RBAController.php";
class BlogsController extends RBAController
{
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data/BlogsModel');
		$this->load->model('data/AuthorsModel');
		$this->load->model('blogposts/CategoryModel');
		$this->data['session'] = $this->session->get_userdata($this->APP_ID . "_appuser");
	}

	/*
	$route["api/v2/blogs/category/add"] = "BlogsController/api_category_insert";
$route["api/v2/blogs/category/get"] = "BlogsController/api_category_get";
$route["api/v2/blogs/category/edit"] = "BlogsController/api_category_edit";
$route["api/v2/blogs/category/delete"] = "BlogsController/api_category_delete";

$route["api/v2/blogs/tag/add"] = "BlogsController/api_tag_insert";
$route["api/v2/blogs/tag/edit"] = "BlogsController/api_tag_edit";
$route["api/v2/blogs/tag/delete"] = "BlogsController/api_tag_delete"; 
	*/

	/* Get All Categories */
	public function api_category_get()
	{
		$data = $this->input->get();
		$result = $this->CategoryModel->get(null, ['id' => $data['id']])[0];
		return $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'active', 'data' => $result]));
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
		foreach ($form_data as $key => $field) {
			if (!empty($field) || is_string($field) && trim($field) !== "") {
				$data[$key] = $field;
			}
		}
		$where = array_pop($data);
		// print_r($data);
		// print_r($where);
		if ($this->CategoryModel->update(['id' => $where], $data)) {
			redirect($this->input->get_request_header('Referer'));
		}
	}
	public function api_category_delete()
	{
		$data = $this->input->post('cat_id');
		if ($this->CategoryModel->delete(['id' => $data])) {
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
	public function api_tag_get()
	{
		$data = $this->input->get();
		$result = $this->TagModel->get(null, ['id' => $data['id']])[0];
		return $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'active', 'data' => $result]));
	}
	public function api_tag_edit()
	{
	}
	public function api_tag_delete()
	{
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
		$this->load->model('blogposts/CategoryModel');
		$this->load->model('blogposts/TagModel');
		$this->data['categories'] = $this->CategoryModel->get();
		$this->data['tags'] = $this->TagModel->get();
		$this->load->admin_dashboard('blogs/new', $this->data);
	}

	// INSERT INTO `cms_posts`(`id`, `title`, `content`, `excerpt`, `image_url`, `category`, `tags`, `seo_title`, `seo_desc`, `seo_thumb`, `author_id`, `created_at`, `updated_at`, `uslug`, `views`, `status`)

	public function edit($slug)
	{
		$this->load->model('blogposts/CategoryModel');
		$this->load->model('blogposts/TagModel');
		$this->data['categories'] = $this->CategoryModel->get();
		$this->data['tags'] = $this->TagModel->get();
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
