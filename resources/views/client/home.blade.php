@extends('layouts.app-cliente')
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sobre</h2>
        <p>Sobre Nós</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p style="text-align: justify;">
            Somos uma instituição comprometida em simplificar e
            otimizar o processo de seleção de candidatos.
            Com o nosso sistema de seleção automática, tornamos
            todo o processo mais eficiente e preciso.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Rápido</li>
            <li><i class="ri-check-double-line"></i> Eficaz</li>
            <li><i class="ri-check-double-line"></i> Económico</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p style="text-align: justify;">
            Nosso sistema utiliza algoritmos avançados para analisar as inscrições dos candidatos de forma automática e imparcial.
             Isso permite que identifiquemos rapidamente os candidatos com maior potencial e adequação aos critérios estabelecidos.
             Além disso, nosso sistema gera balanços e estatísticas diárias, fornecendo uma visão abrangente do número de inscritos por período de tempo. Com essas informações em mãos, você poderá tomar
             decisões embasadas e estratégicas para o processo seletivo.
          </p>
          {{--<a href="#" class="btn-learn-more">Ler Mais</a>--}}
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Clientes satisfeitos</strong> Clientes satisfeitos são o resultado da década</p>
            <a href="#">Descubra mais &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Instituições</strong> Junta-te a outras instituições e seja feliz como eles</p>
            <a href="#">Descubra mais &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Horas de suporte</strong> ou peça ajuda. Por algum motivo ou dúvida</p>
            <a href="#">Descubra mais &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Parceiros</strong> espalhados por muitos pontos do país a tornarem sonhos em realizade</p>
            <a href="#">Descubra mais &raquo;</a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->


  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>CLIENTES SATISFEITOS</h2>
        <p>CLIENTES SATISFEITOS</p>
      </div>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{asset('assets/neutro/images/no-photo.png')}}" class="testimonial-img" alt="">
                <h3>Maria Santos</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  O sistema de seleção automática revolucionou nosso processo de contratação. Agora podemos identificar os candidatos mais qualificados de forma rápida e precisa. Estamos muito satisfeitos com os resultados!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{asset('assets/neutro/images/no-photo.png')}}" class="testimonial-img" alt="">
                <h3>Pedro Silva</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Com o sistema automatizado, ganhamos eficiência e precisão na análise das inscrições. Agora podemos admitir os melhores candidatos com base em critérios claros e objetivos. Recomendo!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{asset('assets/neutro/images/no-photo.png')}}" class="testimonial-img" alt="">
                <h3>Ana Oliveira</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  O sistema de geração de balanços e estatísticas diárias nos fornece insights valiosos sobre o desempenho do nosso processo seletivo. Estamos adorando ter dados concretos para embasar nossas decisões.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{asset('assets/neutro/images/no-photo.png')}}" class="testimonial-img" alt="">
                <h3>José Almeida</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  O sistema automatizado simplificou todo o processo de seleção, economizando tempo e recursos. Agora podemos nos concentrar na análise dos candidatos mais promissores. Estamos impressionados!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="{{asset('assets/neutro/images/no-photo.png')}}" class="testimonial-img" alt="">
                <h3>Camila Rodrigues</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Como membro da comissão de seleção, estou muito feliz com a praticidade das listas nominais geradas em PDF e Excel. Isso facilita nossa revisão e discussão dos candidatos durante o processo seletivo.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Apoio ao Cliente</h3>
        <p> A nossa linha de apoio ao cliente está aberta nos dias e horas normais de trabalho. Ligue sem exitar e vai ter o atendimento imediato.</p>
        <a class="cta-btn" href="#">Ligar Agora</a>
      </div>

    </div>
  </section><!-- End Cta Section -->


  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>F.A.Q</h2>
        <p>PERGUNTAS FREQUENTES</p>
      </div>

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Como funciona o sistema de seleção automática de candidatos?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            O sistema de seleção automática de candidatos utiliza algoritmos avançados para analisar as inscrições dos candidatos com base em critérios predefinidos. Ele classifica e pontua automaticamente os candidatos, identificando os mais qualificados de acordo com os requisitos estabelecidos.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Quais são os critérios utilizados pelo sistema para selecionar os candidatos?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Os critérios utilizados pelo sistema podem variar de acordo com as necessidades e requisitos da instituição. Eles podem incluir experiência profissional, habilidades específicas, qualificações educacionais, resultados de testes ou outras métricas relevantes. Os critérios são definidos e configurados de acordo com as preferências da instituição.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>O sistema de seleção automática substitui completamente o processo manual de seleção de candidatos?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            O sistema de seleção automática é projetado para auxiliar e agilizar o processo de seleção, tornando-o mais eficiente e preciso. Ele automatiza tarefas como triagem de currículos e classificação inicial, permitindo que a equipe foque em etapas mais estratégicas, como entrevistas e avaliações mais aprofundadas. No entanto, a tomada de decisão final ainda é realizada pelos profissionais responsáveis.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Como o sistema de seleção automática gera balanços e estatísticas diárias?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            O sistema registra e processa as informações sobre os candidatos inscritos, como quantidade, perfil demográfico e dados relevantes. Com base nesses dados, ele gera balanços e estatísticas diárias que fornecem uma visão detalhada do número de inscritos por período de tempo, permitindo uma análise mais abrangente do processo seletivo.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>O sistema de seleção automática gera listas nominais de candidatos admitidos e não admitidos?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Sim, o sistema é capaz de gerar listas nominais de candidatos admitidos e não admitidos. Essas listas são disponibilizadas em formato PDF e Excel, permitindo que sejam facilmente compartilhadas e utilizadas pela equipe responsável pelo processo seletivo.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

    </div>
  </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contactar</h2>
        <p>Contactar-Nos</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Nosso Endereço</h3>
                <p>Cassange, Moçamedes, Namibe</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Nosso Email</h3>
                <p>inscritor@gmail.com<br>inscritorsuport@gmail.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Nossos Contactos</h3>
                <p>+244 922 000 000<br>+244 926 000 000</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Seu Nome" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu E-mail" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Carregando</div>
              <div class="error-message"></div>
              <div class="sent-message">Sua mensagens foi bem enviada. Obrigado!</div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection
