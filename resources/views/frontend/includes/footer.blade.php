<!--footer starts here-->
<section id="footer" class="bg-white">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-md-3 border-right links-list">
                <h5>{{__('text.about')}} SCI EDUCATION USA</h5>
                {!! substr(getCMS('about_us'),0,200) !!}
                <a href="{{ route('about-us')}}" style="color:#117a8b">.... Read More</a>
                <div class="footer-team-social">
                    <a href="{{SiteSettings('facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{SiteSettings('instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="{{SiteSettings('twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="{{SiteSettings('linkedin')}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col-md-3 border-right links-list ">
                <h5>{{__('text.quick_links')}}</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{ route('about-us')}}">{{__('text.about_us')}}</a></li>
                    
                    <li><a href="{{ route('videos') }}">{{__('text.videos')}}</a></li>
                    <li><a href="{{ route('team') }}">{{__('text.Administrative_Staff')}}</a></li>
                    <li><a href="{{ route('gallery') }}">{{__('text.gallery')}}</a></li>
                    <li><a href="{{ route('trainings') }}">{{__('text.trainings')}}</a></li>
                    <li><a href="{{ route('programs') }}">{{__('text.programs')}}</a></li>
                    <li><a href="{{ route('projects') }}">{{__('text.projects')}}</a></li>
                </ul>
            </div>

            <div class="col-md-3 border-right links-list ">
                <h5>{{__('text.quick_links')}}</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{route('privacypolicy')}}">{{__('text.privacy_policy')}}</a></li>
                    <li><a href="{{route('termsandconditions')}}">{{__('text.terms_and_conditions')}}</a></li>
                    <li><a href="{{route('career')}}">{{__('text.career')}}</a></li>
                    <li><a href="{{ route('events') }}">{{__('text.events')}}</a></li>
                    <li><a href="{{ route('contact') }}">{{__('text.contact_us')}}</a></li>
                    <li><a href="{{ route('bod') }}">{{__('text.board_of_directors')}}</a></li>
                    


                </ul>
            </div>

            <div class="col-md-3 links-list ">
                <h5>{{__('text.we_accept')}}</h5>
                <ul class="list-unstyled quick-links">
                    <li class="payment-gateway"><a href="#"><img src="{{asset('frontend/images/visa.png')}}"> </a></li>
                    <li class="payment-gateway"><a href="#"><img src="{{asset('frontend/images/master.png')}}"></a></li>
                    <li class="payment-gateway"><a href="#"><img src="{{asset('frontend/images/discover.png')}}"></a>
                    </li>
                    <li class="payment-gateway"><a href="#"><img src="{{asset('frontend/images/paypa.png')}}"></a></li>


                </ul>
            </div>
        </div>
    </div>
</section>
<div class="bottom-navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="h6">
                        @Copyright - SCI Education USA 2020</p>
            </div>
            <div class="col-md-6 text-right">
                <p class="h6"><a href="http://abgroupdevfactory.com/" target="_blank"> Design & Developed By AB Group (P.) Ltd.</a></p>

            </div>

        </div>
    </div>
</div>
<!--Footer ends here-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60085a02c31c9117cb70b163/1esg9v70p';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->