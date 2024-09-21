<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <h3 class="text-white">TERRAZON</h3>
                <p class="description">Nuestra misión es guiar a nuestros clientes hacia su patrimonio perfecto, aquel que se adapte a sus necesidades y estilo de vida. Lo hacemos ofreciendo un servicio excepcional que facilita un proceso de compra o venta transparente y sin inconvenientes.</p>
                <div class="social-icons">
                    @if(config('app.link_facebook')!='')
                    <a class="px-1 social-link" target="_blank" href="{{ config('app.link_facebook') }}"><i class="svg-social-icon-footer svg-social-facebook display-inline"></i></a>
                    @endif
                    @if(config('app.link_instagram')!='')
                    <a class="px-1 social-link" target="_blank" href="{{ config('app.link_instagram') }}"><i class="svg-social-icon-footer svg-social-instagram display-inline"></i></a>
                    @endif
                    @if(config('app.link_youtube')!='')
                    <a class="px-1 social-link" target="_blank" href="{{ config('app.link_youtube') }}"><i class="svg-social-icon-footer svg-social-youtube text-white"></i></a>
                    @endif
                    @if(config('app.link_tiktok')!='')
                    <a class="px-1 social-link" target="_blank" href="{{ config('app.link_tiktok') }}"><i class="svg-social-icon-footer svg-social-tiktok text-white"></i></a>
                    @endif
                    @if(config('app.contact_tel_scape')!='')
                    <a class="px-1 social-link" target="_blank" href="https://wa.me/{{ config('app.contact_tel_scape') }}"><i class="svg-social-icon-footer svg-social-whatsapp text-white"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-3 mt-4">
                <span class="footer-title">Mapa del sitio</span>
                <ul class="list-menu t mt-3">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('inicio') }}">Home</a></li>
                    <li class="{{ Request::is('propiedades') ? 'active' : '' }}"><a href="{{ route('propiedades') }}">Propiedades</a></li>
                    <li class="{{ Request::is('acercade') ? 'active' : '' }}"><a href="{{ route('acercade') }}">Acerca de nosotros</a></li>
                    <li class="{{ Request::is('agentes') ? 'active' : '' }}"><a href="{{ route('public.agentes') }}">Agentes</a></li>
                    <li class="{{ Request::is('contacto') ? 'active' : '' }}"><a href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 mt-4">
                <span class="footer-title">Contáctanos</span>
                <ul class="list-contact mt-3">
                    <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i>{{ config('app.contact_address') }}</li>
                    <li class="d-flex align-items-center"><a href="tel:{{ config('app.contact_tel') }}"><i class="bi bi-telephone-outbound"></i>{{ config('app.contact_tel') }}</a></li>
                    <li class="d-flex align-items-center"><a href="mailto:{{ config('app.contact_email') }}"><i class="fa-regular fa-envelope"></i>{{ config('app.contact_email') }}</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 mt-4">
                <span class="footer-title">Boletín</span>
                <form class="mt-3" id="suscribeFooter">
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Escribe tu email para recibir nuestro boletin" required>
                    </div>
                    <button type="submit" class="btn btn-primary">SUSCRIBIRME</button>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <hr>
            <div class="col text-left fs-7">
                <p class="mb-0">&copy; 2024 Terrazon</p>
            </div>
            <div class="col text-end fs-7">
                <a href="#">Aviso de privacidad</a> | <a href="#">Términos y condiciones</a> | <a href="#">Permisos</a>
            </div>
        </div>
    </div>
</footer>