    <!-- start contact-model -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true"
        method="POST" data-action="{{ route('submit-contact-message') }}">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <a style="cursor: pointer;" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark text-white"></i></a>
                </div>
                <div class="modal-body">
                    <form id="myForm" class="needs-validation contactUsForm" novalidate>
                        <div class="mb-3">
                            <label for="validationCustom05" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                            <div id="email_error" class="error-message text-center"></div>
                        </div>


                        <div class="mb-3">
                            <label for="service" class="form-label">Choose a service</label>
                            <select class="form-select" name="service" id="service" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Web design</option>
                                <option value="2">Digital marketing</option>
                                <option value="3">E-commerce Solution</option>
                                <option value="4">Graphic design</option>
                                <option value="5">Premium: Web design + Digital marketing (4 months) + Graphic design
                                    (4
                                    months)</option>
                                <option value="6">Premium: E-commerce + Digital marketing (4 months) + Graphic design
                                </option>
                                <option value="7">Premium: Digital marketing + E-commerce</option>
                                <option value="8">Graphic design (Up to 20 designs per month)</option>
                                <option value="9">Custom package (Provide a description, and we’ll get in touch)
                                </option>
                            </select>

                            <div id="service_error" class="error-message text-center"></div>

                        </div>


                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">required</span>
                                <small style="font-size: 12px;" class="text-secondary">(please be descriptive)</small>
                            </label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter your message" required></textarea>
                            <div id="description_error" class="error-message text-center"></div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer justify-content-center" id="contact-us-btn">
                    <button class="btn btn-hover-custom">Send Message</button>
                </div>

                <div class="text-center my-4">
                    <button hidden disabled type="button" class="btn custom-button-style col-md-5 py-2" id="loadingBtn">
                        <i class="fa fa-spinner fa-spin me-3"></i> Sending
                    </button>
                </div>

            </div>

        </div>
    </div>
    </div>
    <!-- contact-model end -->
