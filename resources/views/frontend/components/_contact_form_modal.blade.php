    <!-- start contact-model -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true" method="POST" data-action="{{ route('submit-contact-message') }}">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <a style="cursor: pointer;" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark text-white"></i></a>
                </div>
                <div class="modal-body">
                    <form id="myForm" class="needs-validation contactUsForm" novalidate>
                        <div class="mb-3">
                            <label for="validationCustom05" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                            <div id="email_error" class="error-message text-center"></div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="service" class="form-label">Choose a service</label>
                            <select class="form-select" name="service" id="service" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Start Up Web Design</option>
                                <option value="2">Professional web design (Design + Development + Tailored Customization)</option>
                                <option value="3">Digital Marketing</option>
                                <option value="4">Specialized E-Commerce</option>
                                <option value="5">Graphic Design
                                    (Up to 2 design)</option>
                                <option value="6">Premium: E-commerce + Digital marketing (4 months) + Graphic design
                                </option>
                                <option value="7">Professional Web Design + Digital Marketing (4 month) + Graphic Design (4 month)</option>
                                <option value="8">Specialized E-commerce + Digital Marketing (4 month) + Graphic Design</option>
                                <option value="8">Digital Marketing + Specialized E-Commerce</option>
                                <option value="8">Graphic design
                                    (up to 20 design per month)</option>
                                <option value="9">Custom package (Provide a description, and we’ll get in touch)
                                </option>
                            </select>

                            <div id="service_error" class="error-message text-center"></div>
                        </div> --}}

                        {{-- <div class="position-relative mb-3" name="service" id="service">
                            <label for="text" class="form-label" onclick="toggleOptionList()">Choose a
                                service</label>
                            <input name="service" type="text" class="form-control bg-light" id="text" value=" Choose.." readonly
                                required onclick="toggleOptionList()">

                            <div class="option-list border" id="optionList">
                                <ul class="p-0 mb-0">
                                    <li value="1" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Start Up Web Design</li>

                                    <li value="2" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Professional web design (Design + Development + Tailored Customization)</li>
                                    <li value="3" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Digital Marketing</li>

                                    <li value="4" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Specialized E-Commerce</li>

                                    <li value="5" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Graphic Design (Up to 2 design)</li>

                                    <li value="6" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Professional Web Design + Digital Marketing (4 month) + Graphic Design (4 month)</li>

                                    <li value="7" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Specialized E-commerce + Digital Marketing (4 month) + Graphic Design</li>

                                    <li value="8" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Digital Marketing + Specialized E-Commerce</li>

                                    <li value="8" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Graphic design (up to 20 design per month)</li>  
                                                                        
                                    <li value="9" class="hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                        onclick="selectOption(this)">Custom package ( please provide a detailed
                                        explanation on the description)</li>
                                </ul>
                            </div>
                            <div id="service_error" class="error-message text-center"></div>
                        </div> --}}

                        <div class="position-relative mb-3" name="service" id="service">
                            <label for="text" class="form-label" onclick="toggleOptionList()">Choose a service</label>
                            <input name="service" type="text" class="form-control bg-light" id="text" value="Choose.." readonly required onclick="toggleOptionList()">
                            <div class="option-list border" id="optionList">
                                <ul class="p-0 mb-0">
                                    <li value="1" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Start Up Web Design</li>

                                    <li value="2" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Professional web design (Design + Development + Tailored Customization)</li>
                                    <li value="3" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Digital Marketing</li>

                                    <li value="4" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Specialized E-Commerce</li>

                                    <li value="5" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Graphic Design (Up to 2 design)</li>

                                    <li value="6" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Professional Web Design + Digital Marketing (4 month) + Graphic Design (4 month)</li>

                                    <li value="7" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Specialized E-commerce + Digital Marketing (4 month) + Graphic Design</li>

                                    <li value="8" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Digital Marketing + Specialized E-Commerce</li>

                                    <li value="8" class="border-bottom hover-list"
                                        style="padding: .5rem 0.75rem; cursor: pointer;" onclick="selectOption(this)">
                                        Graphic design (up to 20 design per month)</li>  
                                                                        
                                    <li value="9" class="hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                        onclick="selectOption(this)">Custom package ( please provide a detailed
                                        explanation on the description)</li>
                                </ul>
                            </div>
                            <div id="service_error" class="error-message text-center"></div>
                        </div>
                        
                          

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">required</span>
                                <small style="font-size: 12px;" class="text-secondary">(please be descriptive)</small>
                            </label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter your message" required></textarea>
                            <div id="description_error" class="error-message text-center"></div>
                        </div>

                </div>



                </form>
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