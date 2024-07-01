<div class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="d-flex gap-2">
			<div class="nav-item">
				<a href="<?= base_url("posts/all-blogs") ?>" class="nav-link"><i class="link-arrow" data-feather="chevron-left"></i></a>
			</div>
			<div>
				<h4 class="mb-3 mb-md-0">Blog Categories & Tags</h4>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-7 col-lg-6 col-12">
			<div class="card grid-margin">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">New Blog Category</h6>
					</div>
					<div class="">
						<?= form_open("api/v2/blogs/category/add") ?>
						<div class="row">
							<div class="col-lg-4 col-12">
								<div class="mb-3">
									<input type="text" name="title" placeholder="Category Title" class="form-control" id="inputCatName">
								</div>
							</div>
							<div class="col-lg-4 col-12">
								<div class="mb-3">
									<select name="parent" class="form-select" id="selectCatParent">
										<option value="">Select Parent Category</option>
										<?php foreach ($categories as $key => $category) : ?>
											<option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
										<?php endforeach ?>
									</select>
									<script>
										$("#selectCatParent").select2({
											theme: "bootstrap-5",
										});
									</script>
								</div>
							</div>
							<div class="col-lg-auto col-12">
								<button type="submit" class="btn me-2 btn-primary btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="save"></i>Create&nbsp;New</button>
								<button type="reset" class="btn btn-outline-secondary">Discard</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card grid-margin">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">Blog Categories</h6>
					</div>
					<div class="table-responsive">
						<table class="table table-hover mb-0" id="leadsDataTable">
							<thead>
								<tr>
									<th class="pt-0">#</th>
									<th class="pt-0">Title</th>
									<th class="pt-0">Parent Category</th>
									<th class="pt-0">Blog Count</th>
									<th class="pt-0">Date</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($categories) :
									foreach ($categories as $key => $category) : ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><a href=""><?= $category['title'] ?></a><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#categoryEditModal" data-modal-id="<?= $category['id'] ?>" class="catEditLink">&nbsp;<i class="link-arrow p-1" data-feather="edit-3"></i></a></td>
											<td><?= $category['parent'] ??= "NA" ?></td>
											<td><?= $category['blog_count'] ?></td>
											<td><?= $category['created_at'] ?></td>
										</tr>
								<?php endforeach;
								endif; ?>
							</tbody>
						</table>
						<script>
							new DataTable('#leadsDataTable');
							$(".catEditLink").each((index, elem) => {
								$(elem).on('click', () => {
									console.log(elem);
									requestData = {
											data: {
												id: $(elem).attr("data-modal-id")
											}
										},
										$.ajax({
											method: 'POST',
											// url: "<?= base_url('api/v2/blogs/category/get') ?>",
											url: "<?= base_url('api/v2/blogs/category/get') ?>",
											data: JSON.stringify(requestData),
											contentType: "application/json; charset=utf-8",
											success: (data) => {
												$("select#selectCatParentEdit").val($(elem).attr("data-modal-id"))
												$("categoryEditModal input[name='title']").val($(elem).attr("data-modal-id"))
												console.log($("select#selectCatParentEdit"));
												console.log($(elem).attr("data-modal-id"));
											},
											error: (error) => {
												console.log(error);
											}
										})
								})
							})
						</script>
					</div>
					<div class="modal fade" id="categoryEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categoryEditModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="categoryEditModalLabel">Edit Category</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?= form_open("api/v2/blogs/category/edit") ?>
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="mb-3">
												<input type="text" name="title" placeholder="Category Title" class="form-control" id="inputCatName">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="mb-3">
												<input type="hidden" name="cat_id" id="catID" value="">
												<select name="parent" class="form-select" id="selectCatParentEdit">
													<option value="">Select Parent Category</option>
													<?php foreach ($categories as $key => $category) : ?>
														<option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
													<?php endforeach ?>
												</select>
												<script>
													$("#selectCatParentEdit").select2({
														theme: "bootstrap-5",
													});
												</script>
											</div>
										</div>
										<div class="col-lg-auto col-12">
											<button type="submit" class="btn me-2 btn-primary btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="save"></i>Save&nbsp;Changes</button>
											<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
									</form>
								</div>
								<div class="modal-footer">
									<?= form_open('') ?>
									<button type="button" class="btn btn-danger btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="trash-2"></i>Delete</button>
									<?= form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-5 col-lg-6 col-12">
			<div class="card grid-margin">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">New Tag</h6>
					</div>
					<div class="">
						<?= form_open('api/v2/blogs/tag/add') ?>
						<div class="row">
							<div class="col-lg col-12">
								<div class="mb-3">
									<input type="text" name="title" placeholder="Tag Name" class="form-control" id="inputCatName">
								</div>
							</div>
							<div class="col-lg-auto col-12">
								<button type="submit" class="btn me-2 btn-primary btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="save"></i>Create&nbsp;New</button>
								<button type="reset" class="btn btn-outline-secondary">Discard</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card grid-margin">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">Blog Tags</h6>
					</div>
					<div class="table-responsive">
						<table class="table table-hover mb-0" id="blogsTagTable">
							<thead>
								<tr>
									<th class="pt-0">#</th>
									<th class="pt-0">Tag Name</th>
									<th class="pt-0">Blog Count</th>
									<th class="pt-0">Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!is_null($tags)) :
									foreach ($tags as $key => $tag) : ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><a href=""><?= $tag['title'] ?></a><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#tagEditModal" data-modal-id="<?= $tag['id'] ?>" class="tagEditLink">&nbsp;<i class="link-arrow p-1" data-feather="edit-3"></i></a></td>
											<td><?= $tag['blog_count'] ?></td>
											<td><?= $tag['created_at'] ?></td>
										</tr>
								<?php endforeach;
								endif; ?>
							</tbody>
						</table>
						<script>
							new DataTable('#blogsTagTable');
							$(".tagEditLink").each((index, elem) => {
								$(elem).on('click', () => {
									console.log(elem);
									requestData = {
											data: {
												id: $(elem).attr("data-modal-id")
											}
										},
										$.ajax({
											method: 'POST',
											// url: "<?= base_url('api/v2/blogs/category/get') ?>",
											url: "<?= base_url('api/v2/blogs/category/get') ?>",
											data: JSON.stringify(requestData),
											contentType: "application/json; charset=utf-8",
											success: (data) => {
												$("select#selectCatParentEdit").val($(elem).attr("data-modal-id"))
												$("categoryEditModal input[name='title']").val($(elem).attr("data-modal-id"))
												console.log($("select#selectCatParentEdit"));
												console.log($(elem).attr("data-modal-id"));
											},
											error: (error) => {
												console.log(error);
											}
										})
								})
							})
						</script>
						<div class="modal fade" id="tagEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categoryEditModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="categoryEditModalLabel">Edit Category</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<?= form_open('api/v2/blogs/tag/add') ?>
										<div class="row">
											<div class="col-lg col-12">
												<div class="mb-3">
													<input type="text" name="title" placeholder="Tag Name" class="form-control" id="inputTagName">
												</div>
											</div>
											<div class="col-lg-auto col-12">
												<button type="submit" class="btn me-2 btn-primary btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="save"></i>Create&nbsp;New</button>
												<button type="reset" class="btn btn-outline-secondary">Discard</button>
											</div>
										</div>
										</form>
									</div>
									<div class="modal-footer">
										<?= form_open('') ?>
										<button type="button" class="btn btn-danger btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="trash-2"></i>Delete</button>
										<?= form_close() ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- row -->
</div>