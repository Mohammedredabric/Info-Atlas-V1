@extends('layouts.frontfullLayoutMaster')
@section('content')
    <header>
        @include('panles.navbar')
    </header>
    <div class="container">
        <section  class="  page-header section-dark" style="background-image:url('#') ;background-size: cover; background-repeat: no-repeat ; height:100v
    ;width: 100%">
            <div class="filter"></div>
            <div class="content-center">
                <div class="container">
                    <div class="title-brand">
                        <h1 class="presentation-title"></h1>
                        <div class="fog-low">
                            <img src="./assets/img/fog-low.png" alt="">
                        </div>
                        <div class="fog-low right">
                            <img src="./assets/img/fog-low.png" alt="">
                        </div>
                    </div>
                    <h1 class="presentation-subtitle text-center text-secondary">ATLAS BUSINESS DIRECTORY LISTING!</h1>
                    <h4 class="presentation-subtitle text-center text-secondary">Find your local places, you love most to roam around.</h4>
                    <div class="w-50 text-center m-auto">
                        <div class="my-1 p-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-search"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control w-25" placeholder="What Are You Looking For..." aria-label="search" aria-describedby="basic-search">
                                <select class="custom-select " id="">
                                    <option selected>All Categories</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <hr class="w-25">
        <section >
            <h1 class="text-center text-secondary">Popular Categories</h1>
            <h4 class="text-center text-secondary">Popular Categories Wise Listing Is Down Below.</h4>
            <article class="my-4 row text-center">

                <aside class="col-lg-2 col-sm-12 col-md-2">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <i class="fa fa-7x fa-utensils text-white" ></i>
                            <p class="card-text">Restaurant</p>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-2 col-sm-12 col-md-2">
                    <div class="card bg-dark text-white">
                        <div  class="card-body">
                            <i class="fa fa-7x fa-hotel text-white" ></i>
                            <p class="card-text">Hotel</p>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-2 col-sm-12 col-md-2">
                    <div class="card bg-dark text-white">
                        <div  class="card-body">
                            <i class="fa fa-7x fa-shopping-bag text-white" ></i>
                            <p class="card-text">Shopping</p>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-2 col-sm-12 col-md-2">
                    <div class="card bg-dark text-white">
                        <div  class="card-body">
                             <i class="fa fa-7x  fa-heartbeat	 text-white" ></i>
                            <p class="card-text">Fitness</p>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-2 col-sm-12 col-md-2">
                    <div class="card bg-dark text-white">
                        <div  class="card-body">
                            <i class="fa fa-7x fa-female   text-white" ></i>
                            <p class="card-text">Beauty</p>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-2 col-sm-12 col-md-2">
                    <div class="card bg-dark text-white">
                        <div  class="card-body">
                            <i class="fa fa-7x fa-car text-white" ></i>
                            <p class="card-text">Car Rental</p>
                        </div>
                    </div>
                </aside>

            </article>
        </section>
        <hr class="w-25">
        <section >
            <h1 class="text-center text-secondary">Popular Exclusive Listings</h1>
            <h4 class="text-center text-secondary mb-4">Hotels, Resorts, Motels… It’s there for your choosing. Do a search or check Olomo’s selection below.</h4>
            <div id="carouselExampleIndicators" class="carousel slide w-75 m-auto " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block" src="https://dummyimage.com/850x300/000/fff" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block " src="https://dummyimage.com/850x300/000/fff" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block  " src="https://dummyimage.com/850x300/000/fff" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>










        </section>
    </div>

@endsection
