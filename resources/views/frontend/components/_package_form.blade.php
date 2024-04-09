<!-- custom package model -->
<div class="modal fade" id="customPackageModal" tabindex="-1" aria-labelledby="customPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <a style="cursor: pointer;" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark text-white"></i></a>
            </div>
            <div class="modal-body">
                <form id="myForm-2" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="serviceType" class="form-label">Choose a service</label>
                        <select class="form-select" id="serviceType" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="Web design">Web design</option>
                            <option value="Digital marketing">Digital marketing</option>
                            <option value="E-commerce Solution">E-commerce Solution</option>
                            <option value="Graphic design">Graphic design</option>
                            <option value="Custom package">Custom package (Provide a description, and we’ll get in
                                touch)</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a service type.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span
                                class="text-danger">required</span> <small style="font-size: 12px;"
                                class="text-secondary">(please be descriptive)</small>
                        </label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter your message" required></textarea>
                        <div class="invalid-feedback">
                            Please enter a description.
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-hover-custom">Send Message</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
<!-- custom package end -->
