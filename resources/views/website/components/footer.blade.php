<footer class="container">
@if(isset($model))
    @if($model->type_id !== 3)
    <div class="pre-footer">
        <div class="pre-footer_div1">
            
            {{ __('website.footer_title') }}
        </div>
        <div class="pre-footer_div2">
            <a class="foot-font" href="{{ settings('Footer_address') }}">
                {{ settings('Footer_address') }}
            </a>
        </div>
        <div class="pre-footer_div2 footer-padding">
            <a href="tel:{{ settings('footer_phone') }}">
                {{ settings('footer_phone') }}
            </a>
            <a href="address:{{ settings('footer_email') }}">
                {{ settings('footer_email') }}
            </a>
        </div>
    </div>
    @endif
    @endif
    <div class="footer-map">
        <iframe
            src="{{ settings('F_address_Map') }}"  width="640" height="480"></iframe>
    </div>
    <div class="footer-info">
        <a href="#">{{ __('admin.COPYRIGHT') }}</a>
        <a href="https://ideadesigngroup.ge/en">{{ __('admin.MADE_BY_IDEA') }}</a>
    </div>
</footer>