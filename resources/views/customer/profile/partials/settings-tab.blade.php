<div>
                  <div class="section-header" data-aos="fade-up">
                    <h2>Account Settings</h2>
                  </div>

                  <div class="settings-content">
                    <!-- Personal Information -->
                    <div class="settings-section" data-aos="fade-up">
                      <h3>Personal Information</h3>
                      <form method="post" action="{{ route('customer.personal.settings') }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                          <div class="col-md-12">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required="">
                          </div>
                         
                          <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="sarah@example.com" required="">
                          </div>
                         
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                          <button type="submit" class="btn-dark btn">Save Changes</button>
                        </div>

                        
                        <div class="error-message"></div>
                        
                      </form>
                    </div>

                  

                    <!-- Security Settings -->
                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                      <h3>Security</h3>
                      <form class="" method="post" action="{{ route('customer.change.password')}}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                          <div class="col-md-12">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="old_password" required="">
                          </div>
                          <div class="col-md-6">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" required="">
                          </div>
                          <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" required="">
                          </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                          <button type="submit" class="btn-dark btn">Update Password</button>
                        </div>

                        
                      </form>
                    </div>

                    <!-- Delete Account -->
                    <div class="settings-section danger-zone" data-aos="fade-up" data-aos-delay="300">
                      <h3>Delete Account</h3>
                      <div class="danger-zone-content">
                        <p>Once you delete your account, there is no going back. Please be certain.</p>
                        <button type="button" class="btn-danger">Delete Account</button>
                      </div>
                    </div>
                  </div>
                </div>