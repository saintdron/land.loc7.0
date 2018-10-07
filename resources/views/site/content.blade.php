@if(isset($pages) && is_object($pages))
    @foreach($pages as $k => $page)
        @if($k % 2 === 0)
            <!--Home-->
            <section id="{{ $page->alias }}" class="top_cont_outer">
                <div class="home_wrapper">
                    <div class="container">
                        <div class="home_section">
                            <div class="row">
                                <div class="col-lg-5 col-sm-7">
                                    <div class="top_left_cont zoomIn wow">
                                        {!! str_limit($page->text, 315) !!}
                                        <a href="{{ route('page', ['alias' => $page->alias]) }}" class="read_more2">Read
                                            more</a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-5">
                                    {{ Html::image('assets/img/'.$page->images) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Home-->
        @else
            <!--AboutUs-->
            <section id="{{ $page->alias }}">
                <div class="inner_wrapper">
                    <div class="container">
                        <h2>{{ $page->name }}</h2>
                        <div class="inner_section">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                                    {{ Html::image('assets/img/'.$page->images, '', ['class' => 'img-circle delay-03s wow zoomIn']) }}
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                    <div class="delay-01s fadeInDown wow">
                                        {!! str_limit($page->text, 615) !!}
                                    </div>
                                    <div class="work_bottom">
                                        <a href="{{ route('page', ['alias' => $page->alias]) }}" class="contact_btn">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--AboutUs-->
        @endif
    @endforeach
@endif


@if(isset($services) && is_object($services))
    <!--Services-->
    <section id="service">
        <div class="container">
            <h2>Services</h2>
            <div class="service_wrapper">
                @foreach($services as $k => $service)
                    @if($k % 3 === 0)
                        <div class="row {{ ($k !== 0) ? 'borderTop' : ''}}">
                            @endif
                            <div class="col-lg-4 {{ ($k % 3 !== 0) ? 'borderLeft' : ''}} {{ ($k >= 3) ? 'mrgTop' : '' }}">
                                <div class="service_block">
                                    <div class="service_icon delay-03s wow zoomIn">
                                        <span><i class="fa {{ $service->icon }}"></i></span>
                                    </div>
                                    <h3 class="fadeInUp wow">{{ $service->name }}</h3>
                                    <p class="fadeInDown wow">{{ $service->text }}</p>
                                </div>
                            </div>
                            @if(($k + 1) % 3 === 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!--Services-->
@endif


@if(isset($portfolio) && is_object($portfolio))
    <!--Portfolio-->
    <section id="portfolio" class="content">
        <div class="container portfolio_title">
            <div class="section-title">
                <h2>Portfolio</h2>
            </div>
        </div>

        <div class="portfolio-top"></div>

        <div class="portfolio">
            <!-- Portfolio Filters -->
            @if(isset($tags) && is_object($tags))
                <div id="filters" class="sixteen columns">
                    <ul class="clearfix">
                        <li>
                            <a id="all" href="#" data-filter="*" class="active">
                                <h5>All</h5>
                            </a>
                        </li>
                        @foreach($tags as $tag)
                            <li>
                                <a class="" href="#" data-filter=".{{ $tag }}">
                                    <h5>{{ $tag }}</h5>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!--/Portfolio Filters -->

            <!-- Portfolio Wrapper -->
            <div class="isotope fadeInLeft wow" style="position: relative; overflow: hidden; height: 480px;"
                 id="portfolio_wrapper">
                @foreach($portfolio as $item)
                    <div class="portfolio-item one-four isotope-item {{ $item->filter }}">
                        <div class="portfolio_img">
                            {{ Html::image(asset('assets/img/'.$item->images), $item->name) }}
                        </div>
                        <div class="item_overlay">
                            <div class="item_info">
                                <h4 class="project_name">{{ $item->name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--/Portfolio Wrapper -->
        </div>

        <div class="portfolio_btm"></div>

        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>
    </section>
    <!--Portfolio-->
@endif


<!--Clients-->
<!--
<section class="page_section" id="clients">
	<h2>Clients</h2>
	<div class="client_logos">
		<div class="container">
			<ul class="fadeInRight wow">
				<li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo1.png') }}" alt=""></a></li>
				<li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo2.png') }}" alt=""></a></li>
				<li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo3.png') }}" alt=""></a></li>
				<li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo4.png') }}" alt=""></a></li>
			</ul>
		</div>
	</div>
</section>
-->
<!--Clients-->


@if(isset($peoples) && is_object($peoples))
    <!--Team-->
    <section class="page_section team" id="team">
        <div class="container">
            <h2>Team</h2>
            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
            <div class="team_section clearfix">
                @foreach($peoples as $k => $person)
                    <div class="team_area">
                        <div class="team_box wow fadeInDown delay-0{{ 3 * ($k + 1) }}s">
                            <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                            {{ Html::image(asset('assets/img/'.$person->images), $person->name) }}
                            <ul>
                                <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                        <h3 class="wow fadeInDown delay-0{{ 3 * ($k + 1) }}s">{{ $person->name }}</h3>
                        <span class="wow fadeInDown delay-0{{ 3 * ($k + 1) }}s">{{ $person->position }}</span>
                        <p class="wow fadeInDown delay-0{{ 3 * ($k + 1) }}s">{{ $person->text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Team-->
@endif


<!--Footer-->
<footer class="footer_wrapper" id="contact">
    <div class="container">
        <!--Contact-->
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>Contact Us</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>UNIQUE Infoway</h4>
                            <p>104, Some street, NewYork, USA</p>
                        </div>
                        <div class="detail">
                            <h4>call us</h4>
                            <p>+1 234 567890</p>
                        </div>
                        <div class="detail">
                            <h4>Email us</h4>
                            <p>support@sitename.com</p>
                        </div>
                    </div>
                    <ul class="social_links">
                        <li class="twitter bounceIn wow delay-02s">
                            <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="facebook bounceIn wow delay-03s">
                            <a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="pinterest bounceIn wow delay-04s">
                            <a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a>
                        </li>
                        <li class="gplus bounceIn wow delay-05s">
                            <a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">
                        <form action="{{ route('index') }}" method='post'>
                            <input class="input-text" type="text" name="name" value="Your Name *"
                                   onFocus="if(this.value===this.defaultValue)this.value='';"
                                   onBlur="if(this.value==='')this.value=this.defaultValue;">
                            <input class="input-text" type="text" name="email" value="Your E-mail *"
                                   onFocus="if(this.value===this.defaultValue)this.value='';"
                                   onBlur="if(this.value==='')this.value=this.defaultValue;">
                            <textarea class="input-text text-area" name="text" cols="0" rows="0"
                                      onFocus="if(this.value===this.defaultValue)this.value='';"
                                      onBlur="if(this.value==='')this.value=this.defaultValue;">Your Message *</textarea>
                            <input class="input-btn" type="submit" value="send message">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact-->
    </div>
    <div class="container">
        <div class="footer_bottom">
            <span>Compiled by <a href="#">SaintDron</a></span>
        </div>
    </div>
</footer>
<!--Footer-->