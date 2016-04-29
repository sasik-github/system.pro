

<div class="footer">
    <section id='bottom' class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-push-3 col-sm-6">
                    <h4>Ссылки</h4>
                    <div>
                        @include('common._navCommon', ['class' => 'arrow'])
                    </div>
                </div>

                <div class="col-md-3 col-md-push-3 col-sm-6">
                    <h4>Контакты</h4>
                    <address>
                        <strong>ООО «Система ПРО»</strong>
                        <br> 650004, г. Кемерово, ул. Бийская 38, литера Г, офис 5
                        <br> ИНН: 4205262029
                        <br> Телефон: 8(384)276-38-84
                    </address>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    © {{ \Carbon\Carbon::now()->year }} Все права защищены. «Система Про»
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        {{--<li><a href="#">Home</a></li>--}}
                        {{--<li><a href="#">About Us</a></li>--}}
                        {{--<li><a href="#">Faq</a></li>--}}
                        {{--<li><a href="#">Contact Us</a></li>--}}
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
