    <footer>
        <div class="wrapper">
            <div id="footerContent">

                <div id="footerImage">
                    <img src="{{asset('images/logoBig.webp')}}" alt="deep aqua" />
                </div>

                <div id="footerMenu">
                    <ul>
                        <li>Meni</li>
                        <li><a target="_self" rel="follow" href="{{url('/')}}">Početna</a></li>
                        <li><a target="_self" rel="follow" href="{{url('/usluge')}}">Usluge</a></li>
                        <li><a target="_self" rel="follow" href="{{url('/paketi')}}">Paketi</a></li>
                        <li><a target="_self" rel="follow" href="{{url('/galerija')}}">Galerija</a></li>
                        <li><a target="_self" rel="follow" href="{{url('/kontakt')}}">Kontakt</a></li>
                        <li><a target="_self" rel="follow" href="{{url('/prijava')}}">Prijava</a></li>
                    </ul>
                </div>

                <div id="footerAbout">
                    <ul>
                        <li>O nama</li>
                        <li>Dubinsko pranje automobila-nameštaja, poliranje vozila, polimerizacija farova, keramička zaštita, premium spoljno pranje, detailing enterijera, detailing felni, pranje motora, mašinsko sušenje.</li>
                        <li id="socialMedia">
                            <ul id="socialMediaUl">
                                <li><a href="https://www.instagram.com/deep_aqua_detailing/" target="_blank" rel="noopener" ><p class="socialNetworkIconText">Instagram</p><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=100070750123381" target="_blank" rel="noopener" ><p class="socialNetworkIconText">Facebook</p><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCkBMGN15WFm2gfVWcDJjDSw" target="_blank" rel="noopener" ><p class="socialNetworkIconText">Youtube</p><i class="fa fa-youtube-play"></i></a></li>
                                <li><iframe title="Deep Aqua Facebook like page" id="facebookButton" src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D100070750123381&width=106px&layout=button&action=like&size=small&share=false&height=65&appId"  scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe></li>
                            </ul>
                        </li>
                </div>

                <div id="footerContact">
                    <ul>
                        <li>Kontakt</li>
                        <li><a target="_blank" rel="noopener" href="tel:+381668353001"><i class="fa fa-phone"></i> +381 66 835 30 01</a></li>
                        <li><a target="_blank" rel="noopener" href="mailto:kontakt@deepaqua.rs"><i class="fa fa-envelope"></i> kontakt@deepaqua.rs</a></li>
                        <li><p><span><i class="fa fa-map-marker"></i> Jove Torbice 22,</span><span id="content2">Smederevska Palanka</span></p></li>
                    </ul>
                </div>


            </div>
        </div>

        <div id="secondFooter">
            <p>Deep Aqua <span id="year"></span> &copy;</p>
            <img src="{{asset('images/markomilivojevic.webp')}}" alt="marko milivojevic"/>
        </div>
    </footer>

    <div id="scrollToTop"><i class="scrolColor fa fa-angle-up"></i><div>

    @section('javascript')
    <script type="text/javascript" src="{{asset('js/menu.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    @show

</body>
</html>
