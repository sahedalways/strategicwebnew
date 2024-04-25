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
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter your email" required>
                            <div id="email_error" class="error-message text-center"></div>
                        </div>


                        <div class="position-relative mb-3" name="service" id="service">
                            <label for="text" class="form-label" onclick="toggleOptionList()">Choose a
                                service</label>
                            <input name="service" type="text" class="form-control bg-light custom-border-color"
                                id="service" value="" placeholder="Choose service type" readonly required
                                onclick="toggleOptionList()">
                            <div class="option-list border" id="optionList">
                                <ul class="p-0 mb-0">
                                    <li value="Start Up Web Design" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Start Up Web Design</li>

                                    <li value="Professional web design (Design + Development + Tailored Customization)"
                                        class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Professional web design (Design + Development + Tailored Customization)</li>
                                    <li value="Digital Marketing" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Digital Marketing</li>

                                    <li value="Specialized E-Commerce" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Specialized E-Commerce</li>

                                    <li value="Graphic Design (Up to 2 design)" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Graphic Design (Up to 2 design)</li>

                                    <li value="Professional Web Design + Digital Marketing (4 month) + Graphic Design (4 month)"
                                        class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Professional Web Design + Digital Marketing (4 month) + Graphic Design (4 month)
                                    </li>

                                    <li value="Specialized E-commerce + Digital Marketing (4 month) + Graphic Design"
                                        class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Specialized E-commerce + Digital Marketing (4 month) + Graphic Design</li>

                                    <li value="Digital Marketing + Specialized E-Commerce"
                                        class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Digital Marketing + Specialized E-Commerce</li>

                                    <li value="Graphic design (up to 20 design per month)"
                                        class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Graphic design (up to 20 design per month)</li>

                                    <li value="Custom package ( please provide a detailed
                                        explanation on the description)"
                                        class="hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                        onclick="selectOption(this)">
                                        Custom package ( please provide a detailed
                                        explanation on the description)</li>
                                </ul>
                            </div>
                            <div id="service_error" class="error-message text-center"></div>
                        </div>



                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">required</span>
                                <small style="font-size: 12px;" class="text-secondary">(please be descriptive)</small>
                            </label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter your message"
                                required></textarea>
                            <div id="description_error" class="error-message text-center"></div>
                        </div>

                </div>



                </form>
                <div class="modal-footer justify-content-center" id="contact-us-btn">
                    <button class="btn btn-hover-custom">Send Message</button>
                </div>

                <div class="text-center my-4">
                    <button hidden disabled type="button" class="btn custom-button-style col-md-5 py-2"
                        id="loadingBtn">
                        <i class="fa fa-spinner fa-spin me-3"></i> Sending
                    </button>
                </div>

            </div>

        </div>
    </div>
    </div>
    <!-- contact-model end -->
