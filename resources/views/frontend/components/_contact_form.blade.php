    <!-- start contact-model -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <a style="cursor: pointer;" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark text-white"></i></a>
                </div>
                <div class="modal-body">
                    <form id="myForm" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="validationCustom05" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="validationCustom05"
                                placeholder="Enter your email" required>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>

                        <label for="serviceType" class="form-label">Choose a service</label>
                        <select class="form-select" id="serviceType" required>
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

                        <div class="invalid-feedback">
                            Please select a service type.
                        </div>
                </div> -->

                <div class="position-relative mb-3">
                    <label for="text" class="form-label" onclick="toggleOptionList()">Choose a
                        service</label>
                    <input type="text" class="form-control bg-light" id="text" value=" Choose.." readonly
                        required onclick="toggleOptionList()">

                    <div class="option-list border" id="optionList">
                        <ul class="p-0 mb-0">
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                Web design</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                Digital marketing</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                E-commerce Solution</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                Graphic design</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                Premium: Web design + Digital marketing (4 months) + Graphic design (4
                                months)</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                E-commerce + Digital marketing (4 months) + Graphic design</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                Premium: Digital marketing + E-commerce</li>
                            <li class="border-bottom hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">
                                Graphic design (Up to 20 designs per month)</li>
                            <li class="hover-list" style="padding: .5rem 0.75rem; cursor: pointer;"
                                onclick="selectOption(this)">Custom package ( please provide a detailed
                                explanation on the description)</li>
                        </ul>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">required</span>
                        <small style="font-size: 12px;" class="text-secondary">(please be descriptive)</small>
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
    <!-- contact-model end -->
