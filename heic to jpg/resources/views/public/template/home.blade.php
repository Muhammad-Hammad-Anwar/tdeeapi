 <section class=" section1">
        <div class="container">
            <div class="row justify-content-lg-between ">
                <div class="col-lg-5 col-12">
                    <h1 class="heading">{{ $page->title }}</h1>
                    <p class="paragraph">{{ $page->description }}</p>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <form class="form" action="{{ route('calculate') }}" method="POST">
                        @csrf
                        <div class="row form-bg">
                            <div class="form-group col-md-6 col-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mt-2" id="name" placeholder="Enter your name"  name="name" >
                            </div>
                            <div class="form-group col-md-3 col-6">
                                <label for="age">Age</label>
                                <input type="age" class="form-control mt-2" id="age" placeholder="age" name="age" required>
                            </div>
                            <div class="form-group col-md-3 genders-container col-6">
                                <label for="gender">Gender</label>
                                <div class="input-group1  mt-2 bg-white genders-container1" genders
                                    style="border-radius: 13px;">
                                    <div class="tab1-container d-flex ">
                                        <div class="tab1" id="male-tab">
                                            <input type="radio" name="gender" id="male" value="male" checked>
                                            <label for="male"><i class="fa-solid fa-mars-stroke fa-lg male-icon"></i></label>
                                        </div>
                                        <div class="tab1" id="female-tab">
                                            <input type="radio" name="gender" id="female" value="female">
                                            <label for="female"><i class="fas fa-venus fa-lg"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-12 mt-3">
                                <label for="height">Height</label>
                                <div class="bg-light height mt-2 d-flex g-5 rounded-5">
                                  <input type="text" class="form-control bg-white col-md-2 heightinput height-feild input-size" placeholder="ft" id="ft-input" name="height_ft">
                                  <input type="text" class="form-control bg-white col-md-2 heightinput height-feild input-size" placeholder="in" id="in-input" name="height_in">
                                  <input type="text" class="form-control bg-white col-md-2 heightinput height-feild input-size" placeholder="cm" id="cm-input" name="height_cm" style="display: none;">
                                  <select class="form-select bg-white" aria-label="Default select example" onchange="toggleHeightFields(this)">
                                    <option value="0" selected>ft/in</option>
                                    <option value="1">ft</option>
                                    <option value="2">in</option>
                                    <option value="3">cm</option>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <label for="weight">Weight</label>
                                <div class="bg-white height mt-2 rounded-5">
                                  <div class="input-group mt-2">
                                    <input type="text" class="form-control dropdown" id="weight-input-kg" aria-label="Text input with dropdown button" placeholder="kg" name="weight_kg">
                                    <input type="text" class="form-control dropdown" id="weight-input-lbs" aria-label="Text input with dropdown button" placeholder="lbs" name="weight_lbs" style="display: none;">
                                    <button class="btn dropdown-toggle dropdown-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">kg</button>
                                    <ul class="dropdown-menu dropdown-menu-end ">
                                      <li class="dropdown-item" onclick="showInput('kg'); updateDropdown('kg')">Kg</li>
                                      <li class="dropdown-item" onclick="showInput('lbs'); updateDropdown('lbs')">Lbs</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            <div class="form-group col-md-12 mt-3">
                                <label for="activity-level">Activity level</label>
                                <select class="form-select form-select-lg mb-3 mt-2" name="activity-level"
                                    aria-label=".form-select-lg example" required>
                                    <option value="" disabled selected hidden>Activity level</option>
                                    <option value="Sedentary lifestyle">Sedentary lifestyle</option>
                                    <option value="Light exercise">Light exercise</option>
                                    <option value="Moderate exercise">Moderate exercise</option>
                                    <option value="Hard exercise">Hard exercise</option>
                                    <option value="Physical Job or hard exercise">Physical Job or hard exercise</option>
                                    <option value="Professional Job or hard exercise">Professional Job or hard exercise</option>
                                    <option value="Professional Athlete">Professional Athlete</option>
                                </select>
                            </div>
                           <div class="form-group col-md-12 mt-3">
                            <label for="goals">Whats your goal?</label>
                            <select class="form-select form-select-lg mb-3 mt-2" name="goal" aria-label=".form-select-lg example" required>
                                    <option value="" disabled selected hidden>Whats your goal?</option>
                                    <option value="Weight Loss">Weight Loss</option>
                                    <option value="Mid weight Loss">Mid weight Loss</option>
                                    <option value="Extreme Weight Loss">Extreme Weight Loss</option>
                                    <option value="Weight Gain">Weight Gain</option>
                                    <option value="Mid weight Gain">Mid weight Gain</option>
                                    <option value="Extreme Weight Gain">Extreme Weight Gain</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end button-form">
                            <button type="submit" class="form-button text-white">Calculate<img
                                    src="{{ asset('public/images/calculate btn icon.png') }}" class="form-button-img"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
   @if($result = Session::get('data'))
<section class="body-section section-second mt-5">
    <div class="container ">
        <div class="row mt-5 top-container">
            <div class="col-md-12 text-center mt-5">
                <h1 class="fw-bold heading-section2 mb-5">
                    Total Daily Exercise Expenditure (TDEE)
                </h1>
            </div>
            <div class="row bg-white top-container col-12 p-0">
                <div class="col-lg-12 col-md-12 col-12 bg-white p-0">
                    <div class="tabs-container">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active d-flex active-index first-tab"
                                    id="pills-Harris-Benedict-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-Harris-Benedict" type="button" role="tab"
                                    aria-controls="pills-Harris-Benedict" aria-selected="true">
                                    <div class="tabs-images">
                                        <img src="{{ asset('public/images/main icon.png') }}" alt="" class="tab-icons">
                                    </div>
                                    <div class="tabs-heading">Harris-Benedict<br>equation</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex index1" id="pills-Mifflin-St-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-Mifflin-St" type="button"
                                    role="tab" aria-controls="pills-Mifflin-St" aria-selected="false">
                                    <div class="tabs-images">
                                        <img src="{{ asset('public/images/main icon.png') }}" alt="" class="tab-icons">
                                    </div>
                                    <div class="tabs-heading">Mifflin-St. Jeor<br>equation</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex index2" id="pills-Katch-McArdle-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-Katch-McArdle" type="button"
                                    role="tab" aria-controls="pills-Katch-McArdle" aria-selected="false">
                                    <div class="tabs-images">
                                        <img src="{{ asset('public/images/main icon.png') }}" alt="" class="tab-icons">
                                    </div>
                                    <div class="tabs-heading">Katch-McArdle<br>formula</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex index3" id="pills-Cunningham-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-Cunningham" type="button"
                                    role="tab" aria-controls="pills-Cunningham" aria-selected="false">
                                    <div class="tabs-images">
                                        <img src="{{ asset('public/images/main icon.png') }}" alt="" class="tab-icons">
                                    </div>
                                    <div class="tabs-heading">Cunningham<br>formula</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex p index4" id="pills-Oxford-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-Oxford" type="button" role="tab"
                                    aria-controls="pills-Oxford" aria-selected="false">
                                    <div class="tabs-images">
                                        <img src="{{ asset('public/images/main icon.png') }}" alt="" class="tab-icons">
                                    </div>
                                    <div class="tabs-heading">Oxford equation</div>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Harris-Benedict" role="tabpanel"
                                aria-labelledby="pills-Harris-Benedict-tab" tabindex="0">
                                 <div class="row bg-white mx-0">
                                    <div class="col-lg-3 col-md-12 border-end p-5">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per day icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['harris_benedict']['calories']['one_day'] }}</h2>
                                                <p>calories per day</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per week icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['harris_benedict']['calories']['seven_day'] }}</h2>
                                                <p>calories per week</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per month icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['harris_benedict']['calories']['one_month'] }}</h2>
                                                <p>calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12 mt-3">
                                        <p class="section-paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet error enim rerum, deserunt
                                            neque debitis id unde cumque vel adipisci aliquid nisi numquam dolor ea qui, dignissimos
                                            vero fugiat! Quidem enim nihil doloribus vero, officia quo quasi blanditiis deserunt a
                                            reprehenderit delectus necessitatibus reiciendis repellendus modi soluta repellat. Dicta,
                                            labore!
                                        </p>
                                        <div class="content-tdee">
                                            <div class="d-flex align-items-center section-second-content">
                                                <h6 class="">
                                                    <img src="{{ asset('public/images/\Sedentery.png') }}" alt="" class="section-paragraph-img"> Sedentary life style
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(little or no exercise)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Sedentary lifestyle'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Light exercise icon.png') }}" alt="" class="section-paragraph-img"> Light Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1-3 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Light exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Moderate exercise icon.png') }}" alt="" class="section-paragraph-img"> Moderate Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(4-5 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Moderate exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/hard exercise icon.png') }}" alt="" class="section-paragraph-img"> Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(6-7 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/physical job icon.png') }}" alt="" class="section-paragraph-img"> Physical Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or physical job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Physical Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional job icon.png') }}" alt="" class="section-paragraph-img"> Professional Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Professional Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional athlete.png') }}" alt="" class="section-paragraph-img"> Professional Athlete
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional athlete)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['harris_benedict']['levels']['Professional Athlete'] }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row mb-5">
                                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                                        <h1 class="text-center section-second-lossweight p-3">Energy intake to lose weight</h1>
                                        <div class="border-end">
                                            <div class="d-flex align-items-center mt-5">
                                                <h5 class="ms-5">Mild Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(0.5 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['harris_benedict']['goals']['Mid weight Loss'] }}</h2>
                                                    <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['harris_benedict']['goals']['Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Extreme Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(2 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['harris_benedict']['goals']['Extreme Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <h1 class="text-center section-second-gainweight p-3">Energy intake to gain weight</h1>
                                        <div class="d-flex align-items-center mt-5">
                                            <h5 class="ms-5">Mild Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(0.5 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['harris_benedict']['goals']['Mid weight Loss'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(1 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['harris_benedict']['goals']['Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Extreme Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(2 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['harris_benedict']['goals']['Extreme Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Mifflin-St" role="tabpanel"
                                aria-labelledby="pills-Mifflin-St-tab" tabindex="0">
                                 <div class="row bg-white mx-0">
                                    <div class="col-lg-3 col-md-12 border-end p-5">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per day icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['mifflin_st_jeor']['calories']['one_day'] }}</h2>
                                                <p>calories per day</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per week icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['mifflin_st_jeor']['calories']['seven_day'] }}</h2>
                                                <p>calories per week</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per month icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['mifflin_st_jeor']['calories']['one_month'] }}</h2>
                                                <p>calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12 mt-3">
                                        <p class="section-paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet error enim rerum, deserunt
                                            neque debitis id unde cumque vel adipisci aliquid nisi numquam dolor ea qui, dignissimos
                                            vero fugiat! Quidem enim nihil doloribus vero, officia quo quasi blanditiis deserunt a
                                            reprehenderit delectus necessitatibus reiciendis repellendus modi soluta repellat. Dicta,
                                            labore!
                                        </p>
                                        <div class="content-tdee">
                                            <div class="d-flex align-items-center section-second-content">
                                                <h6 >
                                                    <img src="{{ asset('public/images/\Sedentery.png') }}" alt="" class="section-paragraph-img"> Sedentary life style
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(little or no exercise)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Sedentary lifestyle'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Light exercise icon.png') }}" alt="" class="section-paragraph-img"> Light Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1-3 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Light exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Moderate exercise icon.png') }}" alt="" class="section-paragraph-img"> Moderate Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(4-5 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Moderate exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/hard exercise icon.png') }}" alt="" class="section-paragraph-img"> Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(6-7 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/physical job icon.png') }}" alt="" class="section-paragraph-img"> Physical Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or physical job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Physical Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional job icon.png') }}" alt="" class="section-paragraph-img"> Professional Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Professional Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional athlete.png') }}" alt="" class="section-paragraph-img"> Professional Athlete
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional athlete)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['mifflin_st_jeor']['levels']['Professional Athlete'] }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mb-5">
                                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                                        <h1 class="text-center section-second-lossweight p-3">Energy intake to lose weight</h1>
                                        <div class="border-end">
                                            <div class="d-flex align-items-center mt-5">
                                                <h5 class="ms-5">Mild Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(0.5 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['mifflin_st_jeor']['goals']['Mid weight Loss'] }}</h2>
                                                    <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['mifflin_st_jeor']['goals']['Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Extreme Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(2 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['mifflin_st_jeor']['goals']['Extreme Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <h1 class="text-center section-second-gainweight p-3">Energy intake to gain weight</h1>
                                        <div class="d-flex align-items-center mt-5">
                                            <h5 class="ms-5">Mild Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(0.5 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['mifflin_st_jeor']['goals']['Mid weight Loss'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(1 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['mifflin_st_jeor']['goals']['Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Extreme Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(2 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['mifflin_st_jeor']['goals']['Extreme Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Katch-McArdle" role="tabpanel"
                                aria-labelledby="pills-Katch-McArdle-tab" tabindex="0">
                                 <div class="row bg-white mx-0">
                                    <div class="col-lg-3 col-md-12 border-end p-5">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per day icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['katch_mcardle']['calories']['one_day'] }}</h2>
                                                <p>calories per day</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per week icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['katch_mcardle']['calories']['seven_day'] }}</h2>
                                                <p>calories per week</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per month icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['katch_mcardle']['calories']['one_month'] }}</h2>
                                                <p>calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12 mt-3">
                                        <p class="section-paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet error enim rerum, deserunt
                                            neque debitis id unde cumque vel adipisci aliquid nisi numquam dolor ea qui, dignissimos
                                            vero fugiat! Quidem enim nihil doloribus vero, officia quo quasi blanditiis deserunt a
                                            reprehenderit delectus necessitatibus reiciendis repellendus modi soluta repellat. Dicta,
                                            labore!
                                        </p>
                                        <div class="content-tdee">
                                            <div class="d-flex align-items-center section-second-content">
                                                <h6 >
                                                    <img src="{{ asset('public/images/\Sedentery.png') }}" alt="" class="section-paragraph-img"> Sedentary life style
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(little or no exercise)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Sedentary lifestyle'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Light exercise icon.png') }}" alt="" class="section-paragraph-img"> Light Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1-3 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Light exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Moderate exercise icon.png') }}" alt="" class="section-paragraph-img"> Moderate Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(4-5 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Moderate exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/hard exercise icon.png') }}" alt="" class="section-paragraph-img"> Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(6-7 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/physical job icon.png') }}" alt="" class="section-paragraph-img"> Physical Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or physical job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Physical Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional job icon.png') }}" alt="" class="section-paragraph-img"> Professional Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Professional Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional athlete.png') }}" alt="" class="section-paragraph-img"> Professional Athlete
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional athlete)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['katch_mcardle']['levels']['Professional Athlete'] }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mb-5">
                                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                                        <h1 class="text-center section-second-lossweight p-3">Energy intake to lose weight</h1>
                                        <div class="border-end">
                                            <div class="d-flex align-items-center mt-5">
                                                <h5 class="ms-5">Mild Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(0.5 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['katch_mcardle']['goals']['Mid weight Loss'] }}</h2>
                                                    <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['katch_mcardle']['goals']['Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Extreme Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(2 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['katch_mcardle']['goals']['Extreme Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <h1 class="text-center section-second-gainweight p-3">Energy intake to gain weight</h1>
                                        <div class="d-flex align-items-center mt-5">
                                            <h5 class="ms-5">Mild Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(0.5 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['katch_mcardle']['goals']['Mid weight Loss'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(1 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['katch_mcardle']['goals']['Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Extreme Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(2 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['katch_mcardle']['goals']['Extreme Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Cunningham" role="tabpanel"
                                aria-labelledby="pills-Cunningham-tab" tabindex="0">
                                 <div class="row bg-white mx-0">
                                    <div class="col-lg-3 col-md-12 border-end p-5">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per day icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['cunningham']['calories']['one_day'] }}</h2>
                                                <p>calories per day</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per week icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['cunningham']['calories']['seven_day'] }}</h2>
                                                <p>calories per week</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per month icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['cunningham']['calories']['one_month'] }}</h2>
                                                <p>calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12 mt-3">
                                        <p class="section-paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet error enim rerum, deserunt
                                            neque debitis id unde cumque vel adipisci aliquid nisi numquam dolor ea qui, dignissimos
                                            vero fugiat! Quidem enim nihil doloribus vero, officia quo quasi blanditiis deserunt a
                                            reprehenderit delectus necessitatibus reiciendis repellendus modi soluta repellat. Dicta,
                                            labore!
                                        </p>
                                        <div class="content-tdee">
                                            <div class="d-flex align-items-center section-second-content">
                                                <h6>
                                                    <img src="{{ asset('public/images/\Sedentery.png') }}" alt="" class="section-paragraph-img"> Sedentary life style
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(little or no exercise)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Sedentary lifestyle'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Light exercise icon.png') }}" alt="" class="section-paragraph-img"> Light Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1-3 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Light exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Moderate exercise icon.png') }}" alt="" class="section-paragraph-img"> Moderate Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(4-5 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Moderate exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/hard exercise icon.png') }}" alt="" class="section-paragraph-img"> Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(6-7 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/physical job icon.png') }}" alt="" class="section-paragraph-img"> Physical Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or physical job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Physical Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional job icon.png') }}" alt="" class="section-paragraph-img"> Professional Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Professional Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional athlete.png') }}" alt="" class="section-paragraph-img"> Professional Athlete
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional athlete)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['cunningham']['levels']['Professional Athlete'] }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mb-5">
                                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                                        <h1 class="text-center section-second-lossweight p-3">Energy intake to lose weight</h1>
                                        <div class="border-end">
                                            <div class="d-flex align-items-center mt-5">
                                                <h5 class="ms-5">Mild Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(0.5 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['cunningham']['goals']['Mid weight Loss'] }}</h2>
                                                    <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['cunningham']['goals']['Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Extreme Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(2 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['cunningham']['goals']['Extreme Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <h1 class="text-center section-second-gainweight p-3">Energy intake to gain weight</h1>
                                        <div class="d-flex align-items-center mt-5">
                                            <h5 class="ms-5">Mild Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(0.5 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['cunningham']['goals']['Mid weight Loss'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(1 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['cunningham']['goals']['Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Extreme Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(2 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['cunningham']['goals']['Extreme Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Oxford" role="tabpanel"
                                aria-labelledby="pills-Oxford-tab" tabindex="0">
                                 <div class="row bg-white mx-0">
                                    <div class="col-lg-3 col-md-12 border-end p-5">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per day icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['oxford']['calories']['one_day'] }}</h2>
                                                <p>calories per day</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per week icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['oxford']['calories']['seven_day'] }}</h2>
                                                <p>calories per week</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/per month icon.png') }}" alt="" class="img-size">
                                            </div>
                                            <div class="ml-2">
                                                <h2 class="section2-color">{{ $result['bmr']['oxford']['calories']['one_month'] }}</h2>
                                                <p>calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-12 mt-3">
                                        <p class="section-paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet error enim rerum, deserunt
                                            neque debitis id unde cumque vel adipisci aliquid nisi numquam dolor ea qui, dignissimos
                                            vero fugiat! Quidem enim nihil doloribus vero, officia quo quasi blanditiis deserunt a
                                            reprehenderit delectus necessitatibus reiciendis repellendus modi soluta repellat. Dicta,
                                            labore!
                                        </p>
                                        <div class="content-tdee">
                                            <div class="d-flex align-items-center section-second-content">
                                                <h6>
                                                    <img src="{{ asset('public/images/\Sedentery.png') }}" alt="" class="section-paragraph-img"> Sedentary life style
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(little or no exercise)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Sedentary lifestyle'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Light exercise icon.png') }}" alt="" class="section-paragraph-img"> Light Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1-3 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Light exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/Moderate exercise icon.png') }}" alt="" class="section-paragraph-img"> Moderate Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(4-5 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Moderate exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/hard exercise icon.png') }}" alt="" class="section-paragraph-img"> Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(6-7 times a week)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/physical job icon.png') }}" alt="" class="section-paragraph-img"> Physical Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or physical job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Physical Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional job icon.png') }}" alt="" class="section-paragraph-img"> Professional Job or Hard Exercise
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional job)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Professional Job or hard exercise'] }}</h2>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h6>
                                                    <img src="{{ asset('public/images/professional athlete.png') }}" alt="" class="section-paragraph-img"> Professional Athlete
                                                </h6>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(intense exercise or professional athlete)</p>
                                                <h2 class="paragraph-end">{{ $result['bmr']['oxford']['levels']['Professional Athlete'] }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mb-5">
                                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                                        <h1 class="text-center section-second-lossweight p-3">Energy intake to lose weight</h1>
                                        <div class="border-end">
                                            <div class="d-flex align-items-center mt-5">
                                                <h5 class="ms-5">Mild Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(0.5 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['oxford']['goals']['Mid weight Loss'] }}</h2>
                                                    <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(1 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['oxford']['goals']['Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                            <hr class="mx-5 section-second-hr">
                                            <div class="d-flex align-items-center">
                                                <h5 class="ms-5">Extreme Weight loss</h5>
                                                <p class="mt-2 ms-2 section-paragraph-img-paragraph">(2 lbs per week)</p>
                                                <h2 class="paragraph-end3">{{ $result['bmr']['oxford']['goals']['Extreme Weight Loss'] }}</h2>
                                                <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-5">
                                        <h1 class="text-center section-second-gainweight p-3">Energy intake to gain weight</h1>
                                        <div class="d-flex align-items-center mt-5">
                                            <h5 class="ms-5">Mild Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(0.5 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['oxford']['goals']['Mid weight Loss'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(1 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['oxford']['goals']['Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center">
                                            <h5 class="ms-5">Extreme Weight Gain</h5>
                                            <p class="mt-2 ms-2 section-paragraph-img-paragraph2">(2 lbs per week)</p>
                                            <h2 class="paragraph-end2">{{ $result['bmr']['oxford']['goals']['Extreme Weight Gain'] }}</h2>
                                            <div class="mt-2 ms-2 me-5 section-paragraph-img-paragraph2">
                                                        <p>
                                                        (cal per day)
                                                        </p>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
        document.documentElement.scrollTop = 800;
</script>
    <section class="section-three">
        <div class="container section-first py-5">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12  mt-5 ">
                    <div class="accardian-work bg-white pe-md-5">
                        <div class="accordion pb-3" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <div class="d-flex pe-1 pt-">
                                        <button class="accordian-button1 text-white" type="BMR"><img src="{{ asset('public/images/Group 682 (2).png') }}" alt="" style="height: 16px;"> BMR</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Your Basal metabolic rate is
                                        </button>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images\Group 587.png') }}" alt=""
                                                    class="accordian-img-size1 ms-5">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color1">{{ $result['bmr']['harris_benedict']['calories']['one_day'] }}</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/Icon.png') }}" alt=""
                                                    class="accordian-img-size1 ms-5">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color1">{{ $result['bmr']['harris_benedict']['calories']['seven_day'] }}</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/Group 632.png') }}" alt=""
                                                    class="accordian-img-size1 ms-5">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color1">{{ $result['bmr']['harris_benedict']['calories']['one_month'] }}</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse ps-1"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mt-4">
                                            <h5 class="ms-md-5 weight-none">Harris-Benedict
                                                equation</h5>
                                            <h2 class="paragraph-end1">{{ $result['bmr']['harris_benedict']['calories']['one_day'] }} cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4">
                                            <h5 class="ms-md-5">Mifflin-St. Jeor
                                                equation</h5>
                                            <h2 class="paragraph-end1">{{ $result['bmr']['mifflin_st_jeor']['calories']['one_day'] }} cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4">
                                            <h5 class="ms-md-5">Katch-McArdle
                                                formula</h5>
                                            <h2 class="paragraph-end1">{{ $result['bmr']['katch_mcardle']['calories']['one_day'] }} cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4">
                                            <h5 class="ms-md-5">Cunningham
                                                formula</h5>
                                            <h2 class="paragraph-end1">{{ $result['bmr']['cunningham']['calories']['one_day'] }} cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4">
                                            <h5 class="ms-md-5">Oxford Equation</h5>
                                            <h2 class="paragraph-end1">{{ $result['bmr']['oxford']['calories']['one_day'] }} cal</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5  ">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionTwo">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class=" accordian-button2 text-white" type="RMR"><img src="{{ asset('public/images/Group 682 (3).png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> RMR</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"
                                            aria-controls="collapseTwo">
                                            Your Resting Metabolic Rate is :
                                        </button>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public\images\Group 587 (1).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color2 ">{{ $result['rmr']['mifflin_st_jeor']['calories']['one_day'] }}</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public\images\Icon (1).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color2 ">{{ $result['rmr']['mifflin_st_jeor']['calories']['seven_day'] }}</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public\images\Group 632 (1).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color2 ">{{ $result['rmr']['mifflin_st_jeor']['calories']['one_month'] }}</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5  ">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionThree">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class="accordian-button3 text-white" type="BMI"><img src="{{ asset('public/images/Group 682 (6).png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> BMI</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="true" aria-controls="collapseThree">
                                            Your Body Mass Index is :
                                        </button>
                                    </div>
                                    <div class="d-flex  thirdaccardian">
                                        <div class="d-flex mt-3 ">
                                            <div>
                                                <img src="{{ asset('public/images\Group 587 (2).png') }}" alt=""
                                                    class="accordian-img-size2 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color3 ">{{ $result['bmi']['quetelet']['quetelet']}}</h6>
                                                <p class="accordian-section2-color-para">kG m2</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse ps-1"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5 weight-none">
                                                Quetelets formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bmi']['quetelet']['quetelet'] }}KG m2</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Metric formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bmi']['Metric']['Metric']}} KG m2</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                English formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bmi']['English']['English'] }} KG m2</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                WHO formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bmi']['WHO']['WHO']}} KG m2</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                NIH formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bmi']['NIH']['NIH']}} KG m2</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5 ">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionFour">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class=" accordian-button4 text-white" type="IBW"><img src="{{ asset('public\images\ibw icon.png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> IBW</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="true" aria-controls="collapseFour">
                                            Your Ideal Body Weight is :
                                        </button>
                                    </div>
                                    <div class="d-flex forthaccardian">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public\images\Group 587 (6).png') }}" alt=""
                                                    class="accordian-img-size2 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color4">{{ $result['ibw']['GJ_Hamwi']['GJ_Hamwi'] }}</h6>
                                                <p class="accordian-section2-color-para">Kilogram</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse ps-1"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5 weight-none">
                                                G. J. Hamwi Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['GJ_Hamwi']['GJ_Hamwi'] }} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                B. J. Devine Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['BJ_Devine'] ['BJ_Devine']}} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                J. D. Robinson Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['JD_Robinson']['JD_Robinson'] }} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                D. R. Miller Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['DR_Miller']['DR_Miller'] }} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                BMI-based formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['BMI_based']['BMI_based'] }} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Broca Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['Broca']['Broca'] }} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Harry J. M. Lemmens Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['ibw']['Harry']['Harry'] }} Kg</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5 ">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionFive">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class="accordian-button5 text-white" type="BFP"><img src="{{ asset('public\images\bfp icon.png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> BFP</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="true" aria-controls="collapseFive">
                                            Your Body Fat Percentage is :
                                        </button>
                                    </div>
                                    <div class="d-flex fifthaccardian">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public\images\Group 587 (7).png') }}" alt=""
                                                    class="accordian-img-size2 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color5">{{ $result['bfp']['Deurenberg']['Deurenberg'] }} </h6>
                                                <p class="accordian-section2-color-para">Percentage</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse ps-1"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5 weight-none">
                                                Deurenberg Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bfp']['Deurenberg'] ['Deurenberg']}} Cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Deurenberg Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bfp']['Deurenberg2']['Deurenberg2'] }} Cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Gallagher Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bfp']['Gallagher']['Gallagher'] }} Cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Jackson-Pollock Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bfp']['Jackson_Pollock']['Jackson_Pollock'] }} Cal</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Jackson As Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['bfp']['Jackson'] ['Jackson'] }} Cal</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionSix">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class=" accordian-button6 text-white" type="LBW"><img src="{{ asset('public\images\Group 682 (4).png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> LBW</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true"
                                            aria-controls="collapseSix">
                                            Your Lean Body Weight is :
                                        </button>
                                    </div>
                                    <div class="d-flex sixthaccardian">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public\images\Group 587 (9).png') }}" alt=""
                                                    class="accordian-img-size2 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color6">{{ $result['lbw']['Boer']['Boer'] }}</h6>
                                                <p class="accordian-section2-color-para">Kilogram</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse ps-1"
                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5 weight-none">
                                                Boer Equation
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['lbw']['Boer']['Boer']}} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                James Formula
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['lbw']['James']['James']}} Kg</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                Hume Equation
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['lbw']['Hume']['Hume']}} Kg</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionSeven">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class=" accordian-button7 text-white" type="DPN"><img src="{{ asset('public/images/Group 682.png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> DPN</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                            aria-expanded="true" aria-controls="collapseSeven">
                                            Your Daily Protein Need is :
                                        </button>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images\Group 587 (4).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color7">{{ $result['dpn']['RDA'] }}</h6>
                                                <p class="accordian-section2-color-para">per day</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images\Vector (4).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color7">{{ round($result['dpn']['RDA']* 7) }}</h6>
                                                <p class="accordian-section2-color-para">per week</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images\Group 632 (3).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color7">{{ round($result['dpn']['RDA'] * 30) }}</h6>
                                                <p class="accordian-section2-color-para">per month</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse ps-1"
                                    aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5 weight-none">
                                                RDA
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['dpn']['RDA'] }} g</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                ADA
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['dpn']['ADA'] }} g</h2>
                                        </div>
                                        <hr class="mx-5 section-second-hr">
                                        <div class="d-flex align-items-center mt-4 ">
                                            <h5 class="ms-md-5">
                                                IOM
                                            </h5>
                                            <h2 class="paragraph-end1">{{ $result['dpn']['IOM'] }} g</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-5">
                    <div class="accardian-work bg-white pe-5  ">
                        <div class="accordion pb-3" id="accordionEight">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <div class="d-flex pe-1 pt- ">
                                        <button class=" accordian-button8 text-white " type="WHR"><img src="{{ asset('public/images/Group 682 (1).png')}}" alt="" style="height: 16px;margin-bottom: 7px;"> WHR</button>
                                        <button class="accordion-button text-center bg-white mt-1 ps-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                            aria-expanded="true" aria-controls="collapseEight">
                                            Your Waist-To-Hip Ratio is :
                                        </button>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images/Group 587 (5).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color8">6465</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images\Icon (6).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color8">6461</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <img src="{{ asset('public/images\Group 632 (2).png') }}" alt=""
                                                    class="accordian-img-size1 ms-5 ">
                                            </div>
                                            <div class="ml-2">
                                                <h6 class="accordian-section2-color8">646541</h6>
                                                <p class="accordian-section2-color-para">calories per month</p>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   @endif

  <section>
        <div class=" mt-5 bg-section3 ">
            <div class="container bg-white background-section3">
                <div class="row">
                    <div class="col-md-12 text-center mt-5">
                        <h2 class="fw-bold">How to use TDEE Calculator</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-12 section-3-col-work p-4">
                        <div>
                            <img src="{{ asset('public\images\Group 1108.png') }}" alt="Image 1" style="height: 50px;">
                        </div>
                        <div>
                            <h5 class="fw-bold mt-5 section3-headings pe-5">Personal Information</h5>
                        </div>
                        <div>
                            <p class="pe-5 section3-paragraphs" >Enter your personal information like gender, age, weight and height.</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-12 section-3-col-work1 p-4">
                        <img src="{{ asset('public\images\Group 1109.png') }}" alt="Image 1" style="height: 50px;">
                        <h5 class= " fw-bold mt-5 section3-headings pe-5">Activity Level </h5>
                        <p class="section3-paragraphs pe-5">Select your daily activity level for accurate TDEE calculation.</p>
                    </div>
                    <div class="col-lg-2 col-12 section-3-col-work2 p-4">
                        <img src="{{ asset('public\images\Group 1110.png') }}" alt="Image 1" style="height: 50px;">
                        <h5 class=" fw-bold mt-5 section3-headings pe-5">Calculate TDEE</h5>
                        <p class=" section3-paragraphs pe-5"> Get Your TDEE Result in Just One Click!</p>
                    </div>
                    <div class="col-lg-2 col-12 section-3-col-work1 p-4">
                        <img src="{{ asset('public\images\Group 1111.png') }}" alt="Image 1" style="height: 50px;">
                        <h5 class=" fw-bold mt-5 section3-headings pe-5">Your Goal</h5>
                        <p class=" section3-paragraphs pe-5">Set your target: lose weight, maintain, or gain muscle mass.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section>
    <div class="container">
        <div class="row py-5 justify-content-between">
            <div class="col-lg-8 bg-white rounded">
                <div class="tool-content page-content p-4 mt-3">
                    {!! @$page->content !!}
                </div>
            </div>
            <div class="col-lg-3 bg-white rounded">
                <div class="related-articles tool-content mt-3 p-3">
                    <h2 class="text-center">{{ __(dynamicString('related_articles',$language->id)) }}</h2>
                    <div class="related-article-list">
                        @foreach( $page->relatedPages as $relatedBlog)
                            <ul>
                                <li><a href="{{ url(urlGenerate($relatedBlog->parent->slug,$language->id)) }}">{{ $relatedBlog->parent->title }}</a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section>
        <div class="container">
            <div class="row mt-5">
            <div class="col-md-12">
                <div class="mx-auto text-center">
                    <h2 class="fw-bold">Top Article</h2>
                </div>
            </div>
                <div class="col-12 text-center">
                    <h2>{!! @$content->sectionimages_heading->value !!}</h2>
                </div>
            </div>
            <div class="row mt-5 justify-content-between">
                <div class="col-md-4 col-12 px-3">
                    <div class="text-center bg-white section5-images ">
                        <img src="{{ asset('public/images/Image.png') }}" alt="Image 1" class="img-sec">
                        <h5 class="p-2 mt-2">How Fast Can You Lose Fat Without Losing ...?</h5>
                    </div>
                </div>
                <div class="col-md-4 col-12 px-3">
                    <div class="text-center bg-white section5-images ">
                        <img src="{{ asset('public/images/Image2.png') }}" alt="Image 1" class="img-sec">
                        <h5 class="p-2 mt-2">A simple and Accurate BMI Calculator BMI</h5>
                    </div>
                </div>
                <div class="col-md-4 col-12 px-3">
                    <div class="text-center bg-white section5-images ">
                        <img src="{{ asset('public/images/Image1.png') }}" alt="Image 1" class="img-sec">
                        <h5 class="p-2 mt-2">Gain The Perfect Weight With These Smart...</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>



