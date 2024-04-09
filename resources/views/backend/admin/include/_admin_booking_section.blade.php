   <style>
       .custom-select-wrapper {
           height: 40px;
       }

       .make-transparent div p {
           color: #fff;
       }

       ::placeholder {
           color: lightsteelblue;
       }
   </style>
   <div class="card-body">
       <div id="check_availability_area" style="border: 1px solid #BD9D74;" class="container p-3">
           <h6 class="text-center text-light">CHOOSE DATE TO SEARCH</h6>
           <h3 class="text-center text-light">BOOK YOUR GAME</h3>

           <div class="container">
               <div class="row flex-column">

                   <div
                       class="col-sm border py-2 d-flex align-items-center justify-content-between custom-select-wrapper">
                       <label style="line-height: 15px;" for="game_name" class="form-label mb-0 text-light">Game
                           Name<sup style="color:red;">*</sup></label>
                       <div class="dropdown make-transparent">
                           <button style="color: lightsteelblue" name="game_name" class=" border-0 dropdown-toggle"
                               type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                               Select Game
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               @foreach ($games as $game)
                                   <li style="cursor: pointer">
                                       <a id="game" class="dropdown-item game_name custom-drop-1"
                                           data-game-id="{{ $game->id }}"
                                           data-game-price="{{ $game->price }}">{{ $game->name }}</a>
                                   </li>
                               @endforeach
                           </ul>

                       </div>
                   </div>
                   <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="game_name_error">
                   </div>




                   <div
                       class="mt-3 col-sm border d-flex align-items-center justify-content-between custom-select-wrapper py-2">
                       <label style="line-height: 15px;" for="booking_date"
                           class="form-label w-50 mb-0 d-block text-light">Booking Date<sup
                               style="color:red;">*</sup></label>
                       <input style="cursor: pointer; color: lightsteelblue; background: #303A32 !important"
                           placeholder="Enter date here" class="bg-transparent w-50 outline-0 text-right border-0"
                           type="text" id="datepicker" readonly>
                   </div>
                   <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1  d-none" id="date_error">
                   </div>

                   <div class="d-flex flex-md-nowrap flex-wrap p-0 mt-3">
                       <div style="font-size: 14px"
                           class="col-sm w-100 me-md-2 border py-0 d-flex align-items-center justify-content-between custom-select-wrapper">
                           <label style="font-size: 14px;" for="booking_start_time"
                               class="form-label mb-0 text-light">Start
                               Time<sup style="color:red;">*</sup></label>
                           <div class="dropdown make-transparent">
                               <button style="color: lightsteelblue;" name="start_time" style="font-size: 14px"
                                   class=" border-0  dropdown-toggle" type="button" id="dropdownMenuButton_2"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   Select Time
                               </button>
                               <ul id="start_time_dropdown" class="dropdown-menu custom-dropdown"
                                   aria-labelledby="dropdownMenuButton_2">

                                   <li style="cursor: pointer"><a id="start_time" class="dropdown-item_2 dropdown-item"
                                           data-start-time=""></a></li>

                               </ul>
                           </div>

                       </div>


                       <div style="font-size: 14px"
                           class="col-sm mt-md-0 mt-3 border w-100 py-0 d-flex align-items-center justify-content-between custom-select-wrapper">
                           <label style="font-size: 14px" for="booking_end_time" class="form-label mb-0 text-light">End
                               Time<sup style="color:red;">*</sup></label>
                           <div class="dropdown make-transparent">
                               <button style="color: lightsteelblue;" name="end_time" style="font-size: 14px"
                                   class="border-0 dropdown-toggle" type="button" id="dropdownMenuButton_3"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   Select Time
                               </button>
                               <ul id="end_time_dropdown" class="dropdown-menu custom-dropdown"
                                   aria-labelledby="dropdownMenuButton_3">

                                   <li style="cursor: pointer"><a id="end_time" class="dropdown-item dropdown-item_3"
                                           data-end-time=""></a></li>

                               </ul>
                           </div>

                       </div>

                   </div>
                   <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none"
                       id="start_time_error">
                   </div>
                   <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="end_time_error">
                   </div>

               </div>
           </div>

           <div class="d-flex justify-content-center">
               <button id="check_available_court" class="btn btn-primary col-md-6 mt-4 availability-btn border-0">Check
                   Availability</button>

               <button hidden disabled type="button" class="btn btn-primary col-md-6 mt-4 availability-btn border-0"
                   id="loadingSubmittingCheckBtn"> <i class="fa fa-spinner fa-spin me-3" style="color: white;"></i>
                   Checking</button>
           </div>

       </div>

       <div id="court_area" style="border: 1px solid #BD9D74;" class="container p-3 d-none">
           <div class="row">
               <div class="col-sm mb-3">
                   <div id="previous_btn" class="previous-button"> <a><i style="cursor: pointer;"
                               class="fa fa-arrow-circle-left text-light" aria-hidden="true"></i></a> </div>
                   <h3 class="text-center text-light">SELECT YOUR COURT</h3>
                   <div class="list-group make-transparent col-md-8 mx-auto mt-3">
                       <a style="cursor: pointer; max-height: 150px; overflow-y: auto;"
                           class="list-group-item pl-5 list-group-item-action make-transparent">
                           <div class="d-flex w-100 justify-content-between custom-font-color">

                           </div>
                       </a>

                   </div>

               </div>
               @if (auth()->user())
                   <input type="number" id="isAuthExist" value="{{ auth()->user()->id }}" hidden>
               @endif



           </div>
           <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="check_item_error">
           </div>

           <div class="col-sm border py-2 d-flex custom-select-wrapper align-items-center mb-3">
               <label for="name" class="form-label w-100 mb-0 text-light">Name<sup
                       style="color:red;">*</sup></label>
               <input placeholder="Enter your name" style="height: 30px; background: none; color: lightsteelblue;"
                   type="text" id="name" name="name"
                   class="form-control border-0 text-right shadow-none @error('name') is-invalid @enderror">
           </div>
           <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="name_error"></div>

           <div class="col-sm border py-2 d-flex custom-select-wrapper align-items-center mb-3">
               <label for="email" class="form-label w-100 mb-0 text-light">Email<sup
                       style="color:red;">*</sup></label>
               <input placeholder="Enter your email" style="height: 30px; background: none; color: lightsteelblue;"
                   type="text" id="email" name="email"
                   class="form-control border-0 text-right shadow-none @error('email') is-invalid @enderror">
           </div>
           <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="email_error"></div>

           <div class="col-sm border py-2 d-flex custom-select-wrapper align-items-center mb-3">
               <label for="phone_number" class="form-label w-100 mb-0 text-light">Phone Number<sup
                       style="color:red;">*</sup></label>
               <input placeholder="Enter your phone no."
                   style="height: 30px; background: none; color: lightsteelblue;" type="tel" id="phone_number"
                   name="phone_number"
                   class="form-control border-0 text-right shadow-none @error('phone_number') is-invalid @enderror">
           </div>
           <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="phone_number_error">
           </div>

           <div class="col-sm border py-2 d-flex custom-select-wrapper align-items-center mb-3">
               <label for="vip_code" class="form-label w-100 mb-0 text-light">VIP Code</label>
               <input placeholder="Enter VIP code" style="height: 30px; background: none; color: lightsteelblue;"
                   type="text" id="vip_code" name="vip_code"
                   class="form-control border-0 text-right shadow-none @error('vip_code') is-invalid @enderror"
                   maxlength="5">
           </div>
           <div class="col-md-8 mx-auto p-2 rounded-3 mb-3 alert alert-danger mt-1 d-none" id="vip_code_error"></div>


           <div class="row justify-content-center mt-3">
               <div class="col-sm-8 d-flex justify-content-between fs-4">
                   <span class="text-light">Total Cost</span>
                   <span class="text-light" id="total_cost">$0.00</span>
               </div>

               <div class="col-sm-8 d-flex justify-content-between mt-2">
                   <span class="text-light">Total Base Price</span>
                   <span class="text-light" id="total_base_price">$0.00</span>
               </div>

               <div class="col-sm-8 d-flex justify-content-between">
                   <span class="text-light">HST (13%)</span>
                   <span class="text-light" id="total_tax">$0.00</span>
               </div>

               <button id="book_court_btn" type="button"
                   class="btn btn-primary col-md-6 mt-4 availability-btn border-0">Book
                   Your
                   Court Now</button>

               <button hidden disabled type="button" class="btn btn-primary col-md-6 mt-4 availability-btn border-0"
                   id="loadingCourtBook">
                   <i class="fa fa-spinner fa-spin me-3" style="color: white;"></i>
                   Booking</button>


           </div>


       </div>

   </div>
