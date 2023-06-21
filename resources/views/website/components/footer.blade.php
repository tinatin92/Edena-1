<footer class="container">
 
    @if($model->type_id !== 3)
    <div class="pre-footer">
        <div class="pre-footer_div1">
            
            {{ __('website.footer_title') }}
        </div>
        <div class="pre-footer_div2">
            <a class="foot-font" href="{{ settings('Footer_address') }}">
                {{ __('website.footer_address') }}
            </a>
        </div>
        <div class="pre-footer_div2 footer-padding">
            <a href="tel:{{ settings('footer_phone') }}">
               {{ __('website.footer_phone') }}
            </a>
            <a href="address:{{ settings('footer_email') }}">
                {{ __('website.footer_email') }}
            </a>
        </div>
    </div>
    @endif
    <div class="footer-map">
        <iframe
            src="{{ settings('F_address_Map') }}"  width="640" height="480"></iframe>
    </div>
    <div class="footer-info">
        <a href="#">All Rights Reserved</a>
        <a href="#">Kindly Designed by Idea Design Group</a>
    </div>
</footer>