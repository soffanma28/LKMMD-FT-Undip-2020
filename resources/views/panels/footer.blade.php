<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2020 <a href="https://instagram.com/soffan.ma"
          target="_blank">Sabo</a>
      </span>
      <span class="right hide-on-small-only">
        Design and Developed by <a href="https://github.com/soffandluffy">Sabo</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->