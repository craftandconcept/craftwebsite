<template>
  <footer class="footer">
    <div class="container-fluid">
      <div class="row footer-contacts">
        <div class="col-2">
          <div class="phone">
            <h3>Phone:</h3>
            <a href="tel: +41788399321">+41 78 839 93 21</a>
          </div>
        </div>
        <div class="col-2">
          <div class="e-mail">
            <h3>E-mail:</h3>
            <a href="mailto: info@craftandconcept.ch">info@craftandconcept.ch</a>
          </div>
        </div>
        <div class="col-3">
          <div class="text-footer">
            <p>Want to schedule a meeting - text us under chat</p>
          </div>
        </div>
        <div class="col-5">
          <div class="contact-us">
            <h2>Have an idea for new design?</h2>
            <div class="d-flex justify-content-end">
              <button class="btn-footer">Contact Us</button>
            </div>
          </div>
        </div>
      </div>
      <div class="copirating">
        <p>Terms and Conditions</p>
        <p>© 2017 CRAFT & CONCEPT. All rights reserved</p>
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
    width: 100%;
    background: #3E3E3E;
    .footer-contacts{
      padding: 45px 0;
      .phone h3,
      .phone a,
      .e-mail h3,
      .e-mail a,
      .text-footer{
        font-size: 14px;
        line-height: 17px;
        color: #F7F7F7;
        text-decoration: none;
      }
      .contact-us h2{
        font-size: 24px;
        line-height: 30px;
        color: #F7F7F7;
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
          bottom: -5px;
          height: 2px;
          background: #f7f7f7;
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
        transition: all 0.3s;
      }
    }
    .copirating{
      border-top: 1px solid rgba(232, 232, 232, 0.1); 
      padding: 20px 0;
      p{
        font-size: 12px;
        line-height: 15px;
        color: rgba(247, 247, 247, 0.7);
        margin: 0;
        &:last-child{
          margin-top: 20px;
        }
      }
    }
  }
</style>
