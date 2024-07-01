<div class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">All Locations</h4>
		</div>
	</div>

	<div class="row flex-row-reverse">
		<div class="col-xl-4 col-lg-5 col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<div class="card-title">
						<div class="d-flex justify-content-between align-items-baseline mb-3">
							<h6 class="card-title mb-0">Add a New Location</h6>
						</div>
					</div>
					<div class="">
						<div class="mb-3">
							<label for="locName" class="form-label">Location Name:</label>
							<input type="text" class="form-control" id="locName">
						</div>
						<div class="mb-3">
							<label for="locAddress" class="form-label">Location Address:</label>
							<div class="row">
								<div class="col-12">
									<input type="text" placeholder="Address Line 01" class="form-control mb-1" id="locAddress">
								</div>
								<div class="col-12">
									<input type="text" placeholder="Address Line 02" class="form-control mb-1" id="locAddress1">
								</div>
								<div class="col-12">
									<input type="text" placeholder="Address Line 03" class="form-control mb-1" id="locAddress2">
								</div>
								<div class="col-lg-6">
									<input type="text" placeholder="City, State" class="form-control mb-1" id="locAddressCity">
								</div>
								<div class="col-lg-6">
									<input type="text" placeholder="Pin Code" maxlength="7" class="form-control mb-1" id="locAddressState">
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="locContact" class="form-label">Contact Number:</label>
							<input type="text" id="locContact" class="form-control">
						</div>
						<div class="mb-3">
							<label for="locEmail" class="form-label">Email Address:</label>
							<input type="email" id="locEmail" class="form-control">
						</div>
						<div class="">
							<button type="submit" class="btn me-2 btn-primary btn-icon-text"><i class="link-arrow btn-icon-prepend" data-feather="save"></i>Save Location</button>
							<button type="reset" class="btn btn-outline-secondary">Discard</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-8 col-lg-7 col-12 grid-margin">
			<div class="row">
				<div class="col-md-6 col-12 grid-margin">
					<div class="card">
						<div class="card-body">
							<h6 class="card-title mb-3 d-flex justify-content-between">Location 00 <span class="badge bg-warning">Default Location</span></h6>
							<div class="bg-light p-3">
								<div class="row">
									<div class="col-xl-6">
										<p class="mb-2">
											<strong>Address:</strong><br>
											Lorem ipsum dolor sit <br>
											amet consectetur adipisicing elit.<br>
											Accusamus distinctio <br>
											deserunt totam nam porro.
										</p>
									</div>
									<div class="col-xl-6">
										<p class="mb-2">
											<strong>Contact Number:</strong>
											<br>+91 887 647 5783
											<br>+91 887 647 5783
										</p>
										<p class="mb-2">
											<strong>Email Address:</strong>
											<br>info@stemrx.in
										</p>
									</div>
									<div class="col-12">
										<a href="" class="btn btn-sm btn-primary me-2">Show on Google Maps</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<?php for ($i = 0; $i < 10; $i++) : ?>
					<div class="col-md-6 col-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title mb-2">Location <?= $i ?></h6>
								<div class="bg-light p-3">
									<div class="row">
										<div class="col-xl-6">
											<p class="mb-2">
												<strong>Address:</strong><br>
												Lorem ipsum dolor sit <br>
												amet consectetur adipisicing elit.<br>
												Accusamus distinctio <br>
												deserunt totam nam porro.
											</p>
										</div>
										<div class="col-xl-6">
											<p class="mb-2">
												<strong>Contact Number:</strong><br>
												+91 887 647 5783 <br>
												+91 887 647 5783<br>
											</p>
											<p class="mb-2">
												<strong>Email Address:</strong>
												<br>info@stemrx.in
											</p>
										</div>
										<div class="col-12">
											<a href="" class="btn btn-sm btn-primary">Show on Google Maps</a>
											<a href="" class="btn btn-sm btn-outline-primary me-2">Set as Default</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</div>
</div>
