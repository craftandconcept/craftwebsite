<template>
  <footer class="footer" id="footer">
    <div class="container">
      <div class="row footer-contacts">
        <div class="col-xl-4 col-lg-3">
          <div class="phone">
            <h3>_{{$t('call')}}</h3>
            <a href="tel:+41768151818">+41 76 815 18 18</a><br>
            <a href="tel:+41763447544">+41 76 344 75 44</a><br>
            <a href="tel:+41788399321">+41 78 839 93 21</a>
          </div>
        </div>
        <div class="col-xl-4 col-lg-3">
          <div class="e-mail">
            <h3>_{{$t('e-mail:')}}</h3>
            <a href="mailto: info@craftandconcept.ch">info@craftandconcept.ch</a>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4">
          <div class="e-mail">
            <h3>_{{$t('visit')}}</h3>
            <p>
              Avenue des Alpes 98,<br>
              1820 Montreux<br>
              Switzerland
            </p>
          </div>
        </div>
      </div>
      <div class="copirating">
        <p><a href="/CC_terms and conditions.pdf">{{$t('terms-and-conditions')}}</a></p>
        <p><span>{{$t('©-2017-craft-&-concept.')}}</span> {{$t('all-rights-reserved')}}</p>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer'
}
</script>

<style lang="scss">
  .footer{
    margin-top: 30px;
    width: 100%;
    background: #3E3E3E;
    .footer-contacts{
      padding: 20px 0;
      .phone h3,
      .phone a,
      .e-mail h3,
      .e-mail a,
      .e-mail{
        font-size: 14px;
        font-weight: 400;
        line-height: 17px;
        color: #fff;
        text-decoration: none;
      }
      .contact-us h2{
        font-size: 24px;
        line-height: 30px;
        color: #fff;
        text-align: right;
        margin-bottom: 10px;
      }
      a{
        position: relative;
        &:after {
          content: '';
          position: absolute;
          width: 0;
          left: 50%;
          bottom: -2px;
          height: 2px;
          background: #fff;
          transition: all .6s;
        }
        &:hover:after{
          left: 0;
          width: 100%;
        }
      }
      .btn-footer{
        border: none;
        background: #E9E9E9;
        border-radius: 13.5px;
        width: 174px;
        height: 31px;
        cursor: pointer;
        font-size: 14px;
        line-height: 17px;
        color: #000000;
        border: 1px  solid #E9E9E9;
        transition: all 0.3s;
        &:hover{
          background: none;
          color: #E9E9E9;
        }
      }
    }
    .copirating{
      border-top: 1px solid rgba(232, 232, 232, 0.1);
      padding: 15px 0;
      p,
      a{
        text-decoration: none;
        font-size: 12px;
        font-weight: 400;
        line-height: 15px;
        color: rgba(247, 247, 247, 0.7);
        margin: 0;
        &:last-child{
          margin-top: 20px;
        }
        span{
          text-transform: uppercase;
        }
      }
    }
  }
  @media(max-width: 991px){
    .footer {
      .footer-contacts{
        padding: 20px 0;
        .text-footer{
          margin-top: 10px;
        }
      }
    }
  }
  @media(max-width: 767px) {
    h3 {
      margin-top: 15px;
    }
  }
</style>
