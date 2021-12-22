<footer class="footer-16371 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center py-5">
                <div class="footer-site-logo mb-4">
                    <a href="#"><img src="{{ secure_asset('images/blissex.png') }}" height="30" alt=""></a>
                </div>
                <div class="d-flex justify-content-center">
                    <ul class="list-unstyled nav-links" style="display: inline-block;">
                        <li><a href="#">About</a></li>
                        <li><a href="{{ route('store.show') }}">Shop</a></li>
                        <li><a href="{{ route('register') }}">Create Account</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="copyright">
                    <p class="mb-0"><small>©BlissExplorers. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
  $('#dropDown').click(function(){
    $('.drop-down').toggleClass('drop-down--active');
  });
});
</script>
{{-- <script type="text/javascript"> //<![CDATA[
    var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
    document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
  //]]></script>
  <script language="JavaScript" type="text/javascript">
    TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_lg_222x54.png", "POSDV", "none");
  </script> --}}
