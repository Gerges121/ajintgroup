
<div class="homeHero">

  <div class="homeHeroContent" id="ajExistance">
    <div class="heroHeadingAndPara">
      <div id="pButtonContent" class="heroContent">
        <h2>PIONEERS</h2>
        <p>AJ is a global pioneer in recycling used clothing to reduce the risk of textile waste affecting the environment.
        </p>
      </div>
      <div id="sButtonContent" class="heroContent">
        <h2>Sustainability</h2>
        <p>Because we believe we can do more for the environment, all of AJ's tools and containers are made from recycled and safe materials.
          </p>
      </div>
      <div id="eButtonContent" class="heroContent">
        <h2>Empowerment</h2>
        <p>At AJ, our commitment is to deliver top-notch second-hand clothing to the market, maintaining quality throughout the entire process—from collection and sorting to the final delivery to your business.
        </p>
      </div>
    </div>
    <div class="heroContentButtons">
      <button id="pButton" onclick="showContent('pButton')">P</button>
      <button id="sButton" onclick="showContent('sButton')">S</button>
      <button id="eButton" onclick="showContent('eButton')">E</button>
    </div>
  </div>
<div class="ddcontainer">
  <div class="earthImg">
  <a href="#earthContent" > <img  class="earthSpinningImg" src="<?php echo get_template_directory_uri(); ?>/src/img/image1.png" ></a>
  </div>
  <div class="inner-curve">

    <div class="heroBottomContent">
      <h2 id="earthContent"> <span>AJ</span> EXISTANCE
        ON EARTH</h2>
      <div class="botContent">
        <div class="heroBottomContentHthree">
          <h3 onclick="showPopup(this)">16 COUNTRIES ON EARTH</h3>
          <p class="heroBottomContentPara">We Operate in 16 countries Turkey, Germany, United Kingdom, Russia, Georgia, Saudi Arabia, United Arab Emirates, Oman, Kuwait, Qatar, Bahrain, Egypt, Jordan and Yemen. We work relentlessly in each country to support it in reducing the textile waste through safely up-cycling and recycling excess clothes.
          </p>
        </div>
        <div class="heroBottomContentHthree">
          <h3 onclick="showPopup(this)">100,000 CONTAINERS</h3>
          <p class="heroBottomContentPara">In the purpose of reducing textile waste, we setted a goal to collect 300 tons of clothes every day via having over 100,000 containers installed in commercial and public spaces in all of our operating countries for everyone to contribute with their extra clothes and help us in our vision to preserve the environment and leave a green imprint for the future generations.

          </p>
        </div>
        <div class="heroBottomContentHthree">
          <h3 onclick="showPopup(this)">300 TONS OF CLOTHES</h3>
          <p class="heroBottomContentPara">Textile waste is one of the high dangers that affects our surroundings as it pollutes nature via producing methane gas into air. This is why we aim to help everyone to get rid of his extra clothes in a safe way and we have a huge team to support such a purpose.  We are equipped with over 3,000 employees and 500 vehicles to be able to receive such amounts of clothes daily and process it in a speedy and efficient operational flow.

          </p>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <p id="popup-text"></p>
  </div>
</div>


