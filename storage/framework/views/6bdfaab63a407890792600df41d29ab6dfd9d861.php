<?php $__env->startSection('style'); ?>

    <?php echo e(Html::style('theme/css/styles.css')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <div class="page-content" role="main" id="main-content" data-reactid="161">
        <div class="lost-my-name-book color-bg-white" data-reactid="162">
            <div class="wrapper" data-reactid="195">
                <div class="div-carousel-thumbnails">
                    <div class="container">
                        <div id="main_area">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-xs-12" id="slider">
                                    <!-- Top part of the slider -->
                                    <div class="row">
                                        <div class="col-sm-8" id="carousel-bounding-box">
                                            <div class="carousel slide" id="myCarousel">
                                                <!-- Carousel items -->
                                                <div class="carousel-inner">
                                                    <div class="active item" data-slide-number="0">
                                                        <img src="http://placehold.it/770x300&text=one"></div>

                                                    <div class="item" data-slide-number="1">
                                                        <img src="http://placehold.it/770x300&text=two"></div>

                                                    <div class="item" data-slide-number="2">
                                                        <img src="http://placehold.it/770x300&text=three"></div>

                                                    <div class="item" data-slide-number="3">
                                                        <img src="http://placehold.it/770x300&text=four"></div>
                                                </div>
                                                <!-- Carousel nav -->
                                                <a class="left carousel-control" href="#myCarousel" role="button"
                                                   data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" role="button"
                                                   data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4" id="carousel-text"></div>

                                        <div id="slide-content" style="display: none;">
                                            <div id="slide-content-0">
                                                <h2>Slider One</h2>
                                                <p>23 $</p>
                                                <p>Lorem Ipsum Dolor</p>
                                                <hr>
                                                <p class="sub-text">October 24 2014</p>
                                                <p>Đánh giá :
                                                    <span class="rating" style="float: inherit">
                                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                        </span>
                                                </p>

                                            </div>

                                            <?php /*   <div id="slide-content-1">
                                                   <h2>Slider Two</h2>
                                                   <p>Lorem Ipsum Dolor</p>
                                                   <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                                               </div>

                                               <div id="slide-content-2">
                                                   <h2>Slider Three</h2>
                                                   <p>Lorem Ipsum Dolor</p>
                                                   <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                                               </div>

                                               <div id="slide-content-3">
                                                   <h2>Slider Four</h2>
                                                   <p>Lorem Ipsum Dolor</p>
                                                   <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                                               </div>
*/ ?>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/Slider-->

                            <div class="row hidden-xs" id="slider-thumbs">
                                <!-- Bottom switcher of slider -->
                                <ul class="hide-bullets">
                                    <li class="col-sm-2">
                                        <a class="thumbnail" id="carousel-selector-0"><img
                                                    src="http://placehold.it/170x100&text=one"></a>
                                    </li>

                                    <li class="col-sm-2">
                                        <a class="thumbnail" id="carousel-selector-1"><img
                                                    src="http://placehold.it/170x100&text=two"></a>
                                    </li>

                                    <li class="col-sm-2">
                                        <a class="thumbnail" id="carousel-selector-2"><img
                                                    src="http://placehold.it/170x100&text=three"></a>
                                    </li>

                                    <li class="col-sm-2">
                                        <a class="thumbnail" id="carousel-selector-3"><img
                                                    src="http://placehold.it/170x100&text=four"></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-creation-form-wrap" data-reactid="278">
                    <section
                            class="product-creation-form color-bg-stone-light border-top-thin-stone border-bottom-thin-stone"
                            id="lmn-book-form" data-hook="product-creation-form" data-reactid="279">
                        <div class="container padded-rows" data-reactid="280">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="spaced-bottom-small product-creation-form-title"
                                        data-reactid="281"></h3>
                                    <form action="/en-GB/personalized-products/lost-my-name-book/preview"
                                          method="GET"
                                          data-reactid="282">
                                        <div class=" row " data-reactid="283">
                                            <div class="cols-to-rows-on-tablet-down rows-spaced padded-top"
                                                 data-reactid="284">
                                                <div class="col-1-4 col-md-3 col-xs-12" data-reactid="285">
                                                    <div class="inline-label full-width" data-reactid="286"><label
                                                                class="inline-label__tag" for="name"
                                                                data-reactid="287">Name</label><input type="text"
                                                                                                      id="name"
                                                                                                      label="Name"
                                                                                                      class="full-width"
                                                                                                      data-hook="adventurer-fields-name-input"
                                                                                                      name="name"
                                                                                                      value=""
                                                                                                      required=""
                                                                                                      data-reactid="288">
                                                    </div>
                                                </div>
                                                <div class="col-1-4 col-md-3 col-xs-12" data-reactid="289">
                                                    <div class="inline-label full-width color-bg-white"
                                                         data-reactid="290">
                                                        <label class="inline-label__tag" for="customisation_locale"
                                                               data-reactid="291">Language</label><select
                                                                label="Language"
                                                                class="full-width color-bg-white"
                                                                data-hook="adventurer-fields-language-select"
                                                                name="customisation_locale"
                                                                id="customisation_locale"
                                                                data-reactid="292">
                                                            <option selected="" value="en-GB" data-reactid="293">
                                                                English
                                                            </option>
                                                            <option value="en-US" data-reactid="294">English (US)
                                                            </option>
                                                            <option value="de" data-reactid="295">German</option>
                                                            <option value="es" data-reactid="296">Spanish</option>
                                                            <option value="fr" data-reactid="297">French</option>
                                                            <option value="nl" data-reactid="298">Dutch</option>
                                                            <option value="it" data-reactid="299">Italian</option>
                                                            <option value="pt-PT" data-reactid="300">Portuguese (EU)
                                                            </option>
                                                            <option value="sv" data-reactid="301">Swedish</option>
                                                            <option value="da" data-reactid="302">Danish</option>
                                                            <option value="zh-CN" data-reactid="303">Chinese
                                                            </option>
                                                            <option value="ja" data-reactid="304">Japanese</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-1-3 col-1-2-if-no-js col-md-4 col-xs-12"
                                                     data-reactid="305">
                                                    <div class="adventurer" data-reactid="306">
                                                        <input type="radio" name="gender" value="boy"
                                                               id="gender-boy"
                                                               class="adventurer__gender-input adventurer__gender--boy"
                                                               data-reactid="307"><label for="gender-boy"
                                                                                         class="adventurer__gender-label button"
                                                                                         data-reactid="308">Boy</label>
                                                        <input type="radio" name="gender" value="girl"
                                                               id="gender-girl"
                                                               class="adventurer__gender-input adventurer__gender--girl"
                                                               data-reactid="309"><label for="gender-girl"
                                                                                         class="adventurer__gender-label button adventurer__gender-label--last"
                                                                                         data-reactid="310">Girl</label>
                                                        <div class="adventurer__phototype" data-reactid="311">
                                                            <div class="tooltip tooltip--absolute tooltip--huge"
                                                                 data-reactid="312">
                                                                <div class="panel panel--highlight-grass-ceiling padded-small"
                                                                     data-reactid="313">
                                                                    <div class="aligned-center text-milli spaced-bottom-small hidden-on-tablet-down"
                                                                         data-reactid="314">Choose the adventurer in
                                                                        your book
                                                                    </div>
                                                                    <div class="product-lmn row cols-spaced cols-spaced-small overflow-hidden"
                                                                         data-reactid="315">
                                                                        <div class="col-1-3 adventurer__phototype-field"
                                                                             data-reactid="316"><input type="radio"
                                                                                                       name="phototype"
                                                                                                       value="type-ii"
                                                                                                       id="phototype-type-ii"
                                                                                                       class="adventurer__phototype-input"
                                                                                                       data-reactid="317"><label
                                                                                    for="phototype-type-ii"
                                                                                    class="adventurer__phototype-label adventurer__phototype--phototype-ii"
                                                                                    data-reactid="318">
                                                                                <div class="adventurer__phototype-ie-click-target"
                                                                                     data-reactid="319"></div>
                                                                            </label></div>
                                                                        <div class="col-1-3 adventurer__phototype-field"
                                                                             data-reactid="320"><input type="radio"
                                                                                                       name="phototype"
                                                                                                       value="type-iii"
                                                                                                       id="phototype-type-iii"
                                                                                                       class="adventurer__phototype-input"
                                                                                                       data-reactid="321"><label
                                                                                    for="phototype-type-iii"
                                                                                    class="adventurer__phototype-label adventurer__phototype--phototype-iii"
                                                                                    data-reactid="322">
                                                                                <div class="adventurer__phototype-ie-click-target"
                                                                                     data-reactid="323"></div>
                                                                            </label></div>
                                                                        <div class="col-1-3 adventurer__phototype-field"
                                                                             data-reactid="324"><input type="radio"
                                                                                                       name="phototype"
                                                                                                       value="type-vi"
                                                                                                       id="phototype-type-vi"
                                                                                                       class="adventurer__phototype-input"
                                                                                                       data-reactid="325"><label
                                                                                    for="phototype-type-vi"
                                                                                    class="adventurer__phototype-label adventurer__phototype--phototype-vi"
                                                                                    data-reactid="326">
                                                                                <div class="adventurer__phototype-ie-click-target"
                                                                                     data-reactid="327"></div>
                                                                            </label></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1-6 display-none-if-no-js col-md-2"
                                                     data-reactid="328">
                                                    <button type="submit"
                                                            class="hidden-sm hidden-md hidden-xs button button--grey-dark button--raised button--full-width display-none-if-no-js adventurer-fields-save"
                                                            data-hook="adventurer-fields-save-cta"
                                                            data-reactid="329">Go
                                                        to
                                                        preview
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <button type="submit"
                                            class="hidden-lg button button--grey-dark button--raised button--full-width  display-none-if-js"
                                            data-hook="poster-fields-save-cta" data-reactid="330">Go to preview
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
            <div class="wrapper" data-reactid="195">
                <section class="product-info-static" data-reactid="331">
                    <div class="product-info-static-panel" data-reactid="332">
                        <div class="container-guttered" data-reactid="333">
                            <div class="product-info-static-image" data-reactid="334">
                                <div data-reactid="335"><img
                                            src="https://content.wonderbly.com/5e0ad97c9d2980b38fb9f5bb9436624747b49676_name-min.jpg?auto=compress%2Cformat&amp;w=1021"
                                            width="1021" alt=""></div>
                            </div>
                            <div class="product-info-static-copy" data-reactid="337"><h3
                                        class="product-info-static-title" data-reactid="338">Each name tells a
                                    different
                                    story</h3>
                                <div class="color-grey-medium font-sans-serif text-kilo product-info-static-body"
                                     data-animate-text="second" data-reactid="339">
                                    <div class="prismic-rich-text" data-reactid="340"><p data-reactid="341">As if by
                                            magic, the story changes based on the letters of a child’s name. So a
                                            kid
                                            called Charlie might meet a Chameleon, Hippo, Aardvark, Robot, Lobster,
                                            Imp
                                            and Elephant. The story will be as unique as their name.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-static-panel product-info-static-panel-reversed" data-reactid="342">
                        <div class="container-guttered" data-reactid="343">
                            <div class="product-info-static-image" data-reactid="344">
                                <div data-reactid="345"><img
                                            src="https://content.wonderbly.com/297940c9bc1a100d4b26ae79d3b2e40a0bd97c40_dedication-min.jpg?auto=compress%2Cformat&amp;w=949"
                                            width="949" alt=""></div>
                            </div>
                            <div class="product-info-static-copy" data-reactid="347"><h3
                                        class="product-info-static-title" data-reactid="348">Add a personal
                                    message</h3>
                                <div class="color-grey-medium font-sans-serif text-kilo product-info-static-body"
                                     data-animate-text="second" data-reactid="349">
                                    <div class="prismic-rich-text" data-reactid="350"><p data-reactid="351">Mark the
                                            moment by adding your own dedication. We’ll print it at the beginning of
                                            the
                                            story for free.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-static-panel" data-reactid="352">
                        <div class="container-guttered" data-reactid="353">
                            <div class="product-info-static-image" data-reactid="354">
                                <div data-reactid="355"><img
                                            src="https://content.wonderbly.com/b25a985364c30f808d208ede326fd2973121a984_hero-min.jpg?auto=compress%2Cformat&amp;w=1001"
                                            width="1001" alt=""></div>
                            </div>
                            <div class="product-info-static-copy" data-reactid="357"><h3
                                        class="product-info-static-title" data-reactid="358">Put them in the
                                    story</h3>
                                <div class="color-grey-medium font-sans-serif text-kilo product-info-static-body"
                                     data-animate-text="second" data-reactid="359">
                                    <div class="prismic-rich-text" data-reactid="360"><p data-reactid="361">Choose
                                            from
                                            three different adventurers to make sure your book is perfectly
                                            personalised
                                            to your child.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section--product-info color-bg-white overflow-hidden" data-reactid="362">
                    <div class="container container-guttered-on-tablet-up" data-reactid="363">
                        <div class="product-info row cols-spaced cols-to-rows-on-fablet-down child-centered cols-reversed-on-tablet-up product-info--fixed"
                             data-reactid="364">
                            <div class="col-1-2" data-reactid="365">
                                <div class="product-info-content carousel-mask" data-reactid="366">
                                    <div id="lost-my-name-info-slider" class="carousel carousel-drag"
                                         data-reactid="367">
                                        <div class="carousel-slides positioned-relative" data-reactid="368">
                                            <div class="drag carousel-wrap"
                                                 style="width:300%;transform:translateX(0px);-webkit-transform:translateX(0px);"
                                                 data-reactid="369">
                                                <div class="carousel-item carousel-item--active"
                                                     style="width:33.333333333333336%;" data-reactid="370">
                                                    <div style="" data-reactid="371"><img
                                                                src="https://content.wonderbly.com/acb628956b486aa8961688fb4d1d944edba09faa_gifting---min.jpg?auto=compress%2Cformat&amp;w=700"
                                                                alt="" class="carousel-item-image widest"
                                                                width="700">
                                                    </div>
                                                </div>
                                                <div class="carousel-item" style="width:33.333333333333336%;"
                                                     data-reactid="373">
                                                    <div style="" data-reactid="374"><img
                                                                src="https://content.wonderbly.com/7105c3b87eda7008b4561e5ad9c98e5ed8c7426f_quality.jpg?auto=compress%2Cformat&amp;w=700"
                                                                alt="" class="carousel-item-image widest"
                                                                width="700">
                                                    </div>
                                                </div>
                                                <div class="carousel-item" style="width:33.333333333333336%;"
                                                     data-reactid="376">
                                                    <div style="" data-reactid="377"><img
                                                                src="https://content.wonderbly.com/f05cab9762469f1e114545b1240be7d10e9d92e4_dimensions-min.jpg?auto=compress%2Cformat&amp;w=700"
                                                                alt="" class="carousel-item-image widest"
                                                                width="700">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1-2" data-reactid="379">
                                <div class="product-info-content product-info__text" data-reactid="380">
                                    <div class="carousel-nav-wrap" data-reactid="381">
                                        <div class="carousel-nav" data-reactid="382"><a href="#"
                                                                                        class="carousel-nav-item carousel-nav-item--active carousel__inline-nav-item"
                                                                                        data-reactid="383">Gifting</a><a
                                                    href="#" class="carousel-nav-item carousel__inline-nav-item"
                                                    data-reactid="384">Quality</a><a href="#"
                                                                                     class="carousel-nav-item carousel__inline-nav-item"
                                                                                     data-reactid="385">Dimensions</a>
                                        </div>
                                    </div>
                                    <div class="carousel carousel-static carousel--product-info-details"
                                         data-reactid="386">
                                        <div class="carousel-slides positioned-relative" data-reactid="387">
                                            <div class="carousel-wrap carousel-wrap--product-info-details"
                                                 data-reactid="388">
                                                <div class="carousel-item carousel-item--product-info-details carousel-item--active"
                                                     data-reactid="389">
                                                    <div data-reactid="390"><h4 class="text-giga"
                                                                                data-animate-text="first"
                                                                                data-reactid="391">Give the gift of
                                                            a
                                                            stupendous storytime</h4>
                                                        <div class="color-grey-medium font-sans-serif text-kilo"
                                                             data-animate-text="second" data-reactid="392">
                                                            <div class="prismic-rich-text" data-reactid="393"><p
                                                                        data-reactid="394">Our Softcover Classic is
                                                                    perfect for any story time as well as a gift. If
                                                                    you're looking for something that extra bit
                                                                    special,
                                                                    then try our delightful Deluxe Edition, with a
                                                                    wonderful presentation case.</p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item carousel-item--product-info-details"
                                                     data-reactid="395">
                                                    <div data-reactid="396"><h4 class="text-giga"
                                                                                data-animate-text="first"
                                                                                data-reactid="397">Durable Mohawk
                                                            paper
                                                            cover</h4>
                                                        <div class="color-grey-medium font-sans-serif text-kilo"
                                                             data-animate-text="second" data-reactid="398">
                                                            <div class="prismic-rich-text" data-reactid="399"><p
                                                                        data-reactid="400">Our books are printed on
                                                                    thick, high-quality Mohawk paper, which has an
                                                                    elegant eggshell texture and is partly recycled
                                                                    - so
                                                                    it's good for little hands, and the
                                                                    environment!</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item carousel-item--product-info-details"
                                                     data-reactid="401">
                                                    <div data-reactid="402"><h4 class="text-giga"
                                                                                data-animate-text="first"
                                                                                data-reactid="403">Designed for
                                                            sharing</h4>
                                                        <div class="color-grey-medium font-sans-serif text-kilo"
                                                             data-animate-text="second" data-reactid="404">
                                                            <div class="prismic-rich-text" data-reactid="405"><p
                                                                        data-reactid="406">Each book is A4 (29.7cm x
                                                                    21cm) landscape, and opens out to large spreads
                                                                    perfect for shared reading.</p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section--full-bleed" data-reactid="407">
                    <div style="" data-reactid="408"><img
                                src="https://content.wonderbly.com/6e6aa744466ee415f80d45208f8f6c9097101b32_lifestyle-lmn--min.jpg?auto=compress%2Cformat&amp;w=2400"
                                width="2400" alt=""></div>
                </section>
                <section class="section--reviews padded-rows-big color-bg-white" data-reactid="410">
                    <div class="container" data-reactid="411">
                        <div class="positioned-relative" data-reactid="412"><h3 class="text-giga"
                                                                                data-reactid="413">
                                Reviews</h3>
                            <div class="reviews-overall-star-rating" data-reactid="414">
                                <div class="reviews-overall-rating text-kilo" data-reactid="415"><span
                                            class="text-mega color-grey-dark" data-reactid="416">9.8</span><span
                                            class="text-milli color-grey-medium" data-reactid="417"> / 10</span>
                                </div>
                                <div class="star-rating" data-reactid="418">
                                    <div class="star-rating-star" data-reactid="419"><span class="ss-icon ss-star"
                                                                                           data-reactid="420"></span>
                                    </div>
                                    <div class="star-rating-star" data-reactid="421"><span class="ss-icon ss-star"
                                                                                           data-reactid="422"></span>
                                    </div>
                                    <div class="star-rating-star" data-reactid="423"><span class="ss-icon ss-star"
                                                                                           data-reactid="424"></span>
                                    </div>
                                    <div class="star-rating-star" data-reactid="425"><span class="ss-icon ss-star"
                                                                                           data-reactid="426"></span>
                                    </div>
                                    <div class="star-rating-star" data-reactid="427"><span class="ss-icon ss-star"
                                                                                           data-reactid="428"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container padded-left-on-tablet padded-right-on-tablet" data-reactid="429">
                        <div class="carousel-nav spaced-bottom-none" data-reactid="430"><a href="#"
                                                                                           class="carousel-nav-item carousel-nav-item--active"
                                                                                           data-reactid="431">Grown
                                ups</a><a href="#" class="carousel-nav-item" data-reactid="432">Little Ones</a>
                        </div>
                    </div>
                    <div class="container" data-reactid="433">
                        <div class="reviews spaced-bottom-big" data-reactid="434">
                            <div class="carousel carousel-static carousel--review" data-reactid="435">
                                <div class="carousel-slides positioned-relative" data-reactid="436">
                                    <div class="carousel-wrap carousel-wrap--review" data-reactid="437">
                                        <div class="carousel-item carousel-item--review carousel-item--active"
                                             data-reactid="438">
                                            <div data-reactid="439">
                                                <div data-reactid="440">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="441">
                                                        <div class="col-1-5 col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="442">
                                                            <div class="review__star-rating" data-reactid="443">
                                                                <div class="star-rating" data-reactid="444">
                                                                    <div class="star-rating-star"
                                                                         data-reactid="445">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="446"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="447">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="448"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="449">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="450"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="451">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="452"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="453">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="454"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="review__meta" data-reactid="455"><h4
                                                                        class="review__author" data-reactid="456">
                                                                    Jayne</h4></div>
                                                        </div>
                                                        <div class="col-4-5" data-reactid="457"><h5
                                                                    class="review__title text-mega color-grey-dark"
                                                                    data-reactid="458">Fantastic</h5>
                                                            <p class="review__content review__content--snippet font-sans-serif spaced-bottom-none"
                                                               data-reactid="459"><!-- react-text: 460 -->My 6 year
                                                                old
                                                                daughter is autistic so has problems with her
                                                                understanding of language. I bought her the book
                                                                'The
                                                                Little Girl Who Lost Her Name'...
                                                                <!-- /react-text --><a
                                                                        href="#" data-reactid="461">See more</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="462"></div>
                                                </div>
                                                <div data-reactid="463">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="464">
                                                        <div class="col-1-5 col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="465">
                                                            <div class="review__star-rating" data-reactid="466">
                                                                <div class="star-rating" data-reactid="467">
                                                                    <div class="star-rating-star"
                                                                         data-reactid="468">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="469"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="470">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="471"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="472">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="473"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="474">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="475"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="476">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="477"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="review__meta" data-reactid="478"><h4
                                                                        class="review__author" data-reactid="479">
                                                                    John</h4></div>
                                                        </div>
                                                        <div class="col-4-5" data-reactid="480"><h5
                                                                    class="review__title text-mega color-grey-dark"
                                                                    data-reactid="481">The BEST customer service I
                                                                EVER
                                                                received bar none!!!!</h5>
                                                            <p class="review__content review__content--snippet font-sans-serif spaced-bottom-none"
                                                               data-reactid="482"><!-- react-text: 483 -->
                                                                Unfortunately
                                                                my order got caught up in the mail somewhere and
                                                                never
                                                                reached my niece. Wonderbly responded to my e-mail
                                                                within an hour and could... <!-- /react-text --><a
                                                                        href="#" data-reactid="484">See more</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="485"></div>
                                                </div>
                                                <div data-reactid="486">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="487">
                                                        <div class="col-1-5 col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="488">
                                                            <div class="review__star-rating" data-reactid="489">
                                                                <div class="star-rating" data-reactid="490">
                                                                    <div class="star-rating-star"
                                                                         data-reactid="491">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="492"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="493">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="494"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="495">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="496"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="497">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="498"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="499">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="500"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="review__meta" data-reactid="501"><h4
                                                                        class="review__author" data-reactid="502">
                                                                    Samantha</h4></div>
                                                        </div>
                                                        <div class="col-4-5" data-reactid="503"><h5
                                                                    class="review__title text-mega color-grey-dark"
                                                                    data-reactid="504">Love these books!</h5>
                                                            <p class="review__content review__content--snippet font-sans-serif spaced-bottom-none"
                                                               data-reactid="505"><!-- react-text: 506 -->I was
                                                                given a
                                                                Lost My Name book as a baby shower gift and
                                                                immediately
                                                                fell in love. Since getting my son's book less than
                                                                a
                                                                year ago, I've given... <!-- /react-text --><a
                                                                        href="#"
                                                                        data-reactid="507">See
                                                                    more</a></p></div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="508"></div>
                                                </div>
                                                <div data-reactid="509">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="510">
                                                        <div class="col-1-5 col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="511">
                                                            <div class="review__star-rating" data-reactid="512">
                                                                <div class="star-rating" data-reactid="513">
                                                                    <div class="star-rating-star"
                                                                         data-reactid="514">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="515"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="516">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="517"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="518">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="519"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="520">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="521"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="522">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="523"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="review__meta" data-reactid="524"><h4
                                                                        class="review__author" data-reactid="525">
                                                                    Paul
                                                                    Thackray</h4></div>
                                                        </div>
                                                        <div class="col-4-5" data-reactid="526"><h5
                                                                    class="review__title text-mega color-grey-dark"
                                                                    data-reactid="527">AMAZING BOOK</h5>
                                                            <p class="review__content review__content--snippet font-sans-serif spaced-bottom-none"
                                                               data-reactid="528"><!-- react-text: 529 -->Book
                                                                arrived
                                                                so quickly very impressed. I was like a child
                                                                reading
                                                                the book which was purchased for my granddaughters
                                                                forthcoming birthday (and I...<!-- /react-text --><a
                                                                        href="#" data-reactid="530">See more</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="531"></div>
                                                </div>
                                                <div data-reactid="532">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="533">
                                                        <div class="col-1-5 col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="534">
                                                            <div class="review__star-rating" data-reactid="535">
                                                                <div class="star-rating" data-reactid="536">
                                                                    <div class="star-rating-star"
                                                                         data-reactid="537">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="538"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="539">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="540"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="541">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="542"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="543">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="544"></span></div>
                                                                    <div class="star-rating-star"
                                                                         data-reactid="545">
                                                                        <span class="ss-icon ss-star"
                                                                              data-reactid="546"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="review__meta" data-reactid="547"><h4
                                                                        class="review__author" data-reactid="548">
                                                                    Pooja
                                                                    Deshpande Shetye</h4></div>
                                                        </div>
                                                        <div class="col-4-5" data-reactid="549"><h5
                                                                    class="review__title text-mega color-grey-dark"
                                                                    data-reactid="550">A GREAT PRODUCT AND A GREAT
                                                                COMPANY!</h5>
                                                            <p class="review__content review__content--snippet font-sans-serif spaced-bottom-none"
                                                               data-reactid="551"><!-- react-text: 552 -->This is
                                                                the
                                                                best book I've ever purchased! Nothing compares and
                                                                my
                                                                son will treasure it for a lifetime. The customer
                                                                service is also exceptional...<!-- /react-text --><a
                                                                        href="#" data-reactid="553">See more</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="554"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item carousel-item--review" data-reactid="555">
                                            <div data-reactid="556">
                                                <div data-reactid="557">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="558">
                                                        <div class="col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="559">
                                                            <div class="review__star-rating" data-reactid="560"><img
                                                                        src="https://content.wonderbly.com/932fee9cd42f1734eabb9b389379b92fae6e1532_stars1.jpg?auto=compress%2Cformat&amp;w=140"
                                                                        width="140" class="star-rating max-width"
                                                                        alt=""
                                                                        data-reactid="561"></div>
                                                            <div class="review__meta" data-reactid="562"><h4
                                                                        class="review__author color-grey-dark"
                                                                        data-reactid="563">Lilah</h4>
                                                                <p class="review__age font-sans-serif spaced-none"
                                                                   data-reactid="564">8 years old</p></div>
                                                        </div>
                                                        <div class="col-4-5 spaced-top-small-on-fablet-down"
                                                             data-reactid="565">
                                                            <div data-reactid="566"><img
                                                                        src="https://content.wonderbly.com/7dcf31d2687071ea72d553e123527f1ac78682d1_adultreview1.jpg?auto=compress%2Cformat&amp;w=425"
                                                                        width="425" class="review__image max-width"
                                                                        alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="568"></div>
                                                </div>
                                                <div data-reactid="569">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="570">
                                                        <div class="col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="571">
                                                            <div class="review__star-rating" data-reactid="572"><img
                                                                        src="https://content.wonderbly.com/2c9643ed5f0866eb404faf09d43edfd23e97fdf1_stars2.jpg?auto=compress%2Cformat&amp;w=140"
                                                                        width="140" class="star-rating max-width"
                                                                        alt=""
                                                                        data-reactid="573"></div>
                                                            <div class="review__meta" data-reactid="574"><h4
                                                                        class="review__author color-grey-dark"
                                                                        data-reactid="575">Alma</h4>
                                                                <p class="review__age font-sans-serif spaced-none"
                                                                   data-reactid="576">3 years old</p></div>
                                                        </div>
                                                        <div class="col-4-5 spaced-top-small-on-fablet-down"
                                                             data-reactid="577">
                                                            <div data-reactid="578"><img
                                                                        src="https://content.wonderbly.com/749f45751bc9e39a5f31e23d27d9865ca0a0b2bd_adultreview2.jpg?auto=compress%2Cformat&amp;w=427"
                                                                        width="427" class="review__image max-width"
                                                                        alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="580"></div>
                                                </div>
                                                <div data-reactid="581">
                                                    <div class="row cols-spaced cols-to-rows-on-fablet-down padded-top-big padded-bottom-big"
                                                         data-reactid="582">
                                                        <div class="col-1-5 cols-reversed-on-fablet-down"
                                                             data-reactid="583">
                                                            <div class="review__star-rating" data-reactid="584"><img
                                                                        src="https://content.wonderbly.com/0212d132e8b5c48f7d74b6686e8f590429fb6e07_stars3.jpg?auto=compress%2Cformat&amp;w=140"
                                                                        width="140" class="star-rating max-width"
                                                                        alt=""
                                                                        data-reactid="585"></div>
                                                            <div class="review__meta" data-reactid="586"><h4
                                                                        class="review__author color-grey-dark"
                                                                        data-reactid="587">Mia</h4>
                                                                <p class="review__age font-sans-serif spaced-none"
                                                                   data-reactid="588">6 years old</p></div>
                                                        </div>
                                                        <div class="col-4-5 spaced-top-small-on-fablet-down"
                                                             data-reactid="589">
                                                            <div data-reactid="590"><img
                                                                        src="https://content.wonderbly.com/2377e632a77fda40884735df5a576daf8ca7267c_adultreview3.jpg?auto=compress%2Cformat&amp;w=465"
                                                                        width="465" class="review__image max-width"
                                                                        alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="rule--medium" data-reactid="592"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aligned-center" data-reactid="593">
                            <button class="button button--grey-medium button--raised full-width-on-tablet-down"
                                    data-reactid="594">Create your book
                            </button>
                        </div>
                    </div>
                </section>
                <div class="color-bg-stone-light" data-reactid="595">
                    <section
                            class="padded-rows-big border-top-thin-stone border-bottom-thin-stone section section--undefined"
                            data-reactid="596">
                        <div class="container" data-reactid="597"><h3
                                    class="padded-bottom aligned-center text-giga" data-reactid="598">Perfectly
                                partnered with</h3></div>
                        <div class="container" data-reactid="599">
                            <div class="product-list product-list--ddf-block" data-reactid="600">
                                <div class="product-list-item" data-reactid="601"><a
                                            href="/en-GB/personalized-products/the-christmas-snowflake"
                                            class="product-list-inner product-list-inner--snowflake"
                                            data-reactid="602">
                                        <div class="product-list-image" data-reactid="603">
                                            <div data-reactid="604"><img
                                                        src="https://prismic-io.s3.amazonaws.com/lost-my-name-v2/a0d0ae03e4fc68aabef49f79cc162d445bae8e10_tcs_all_product_page_image_410x410.png?w=254&amp;q=70&amp;auto=format%2Ccompress"
                                                        width="254" class="max-width"
                                                        srcset="https://prismic-io.s3.amazonaws.com/lost-my-name-v2/a0d0ae03e4fc68aabef49f79cc162d445bae8e10_tcs_all_product_page_image_410x410.png?w=508&amp;q=70&amp;auto=format%2Ccompress 2x"
                                                        alt=""></div>
                                        </div>
                                        <div class="product-list-text" data-reactid="606">
                                            <div class="product-list-title" data-reactid="607">The Christmas
                                                Snowflake
                                            </div>
                                            <div class="product-list-cta" data-reactid="608">Find out more</div>
                                        </div>
                                    </a></div>
                                <div class="product-list-item" data-reactid="609"><a
                                            href="/en-GB/personalized-products/kingdom-of-you-book"
                                            class="product-list-inner product-list-inner--kingdom-of-you"
                                            data-reactid="610">
                                        <div class="product-list-image" data-reactid="611">
                                            <div data-reactid="612"><img
                                                        src="https://prismic-io.s3.amazonaws.com/lost-my-name-v2/075b122591f9bdf2665758f12227845a1bf515c6_kingdom-of-you-book.png?w=254&amp;q=70&amp;auto=format%2Ccompress"
                                                        width="254" class="max-width"
                                                        srcset="https://prismic-io.s3.amazonaws.com/lost-my-name-v2/075b122591f9bdf2665758f12227845a1bf515c6_kingdom-of-you-book.png?w=508&amp;q=70&amp;auto=format%2Ccompress 2x"
                                                        alt=""></div>
                                        </div>
                                        <div class="product-list-text" data-reactid="614">
                                            <div class="product-list-title" data-reactid="615">Kingdom of You</div>
                                            <div class="product-list-cta" data-reactid="616">Find out more</div>
                                        </div>
                                    </a></div>
                                <div class="product-list-item" data-reactid="617"><a
                                            href="/en-GB/personalized-products/the-littlest-bear-book"
                                            class="product-list-inner product-list-inner--littlest-bear"
                                            data-reactid="618">
                                        <div class="product-list-image" data-reactid="619">
                                            <div data-reactid="620"><img
                                                        src="https://prismic-io.s3.amazonaws.com/lost-my-name-v2/520bfb98a74f386736cfaf62782daf19f7ff994b_littlest-bear.png?w=254&amp;q=70&amp;auto=format%2Ccompress"
                                                        width="254" class="max-width"
                                                        srcset="https://prismic-io.s3.amazonaws.com/lost-my-name-v2/520bfb98a74f386736cfaf62782daf19f7ff994b_littlest-bear.png?w=508&amp;q=70&amp;auto=format%2Ccompress 2x"
                                                        alt=""></div>
                                        </div>
                                        <div class="product-list-text" data-reactid="622">
                                            <div class="product-list-title" data-reactid="623">A Letter for the
                                                Littlest
                                                Bear
                                            </div>
                                            <div class="product-list-cta" data-reactid="624">Find out more</div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>