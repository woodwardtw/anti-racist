<?php
/**
 * Partial template for content in home.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="container-fluid">
        <div class="row header">
            <div class="col-md-3">
                <div class="title">
                    <h1>
                        <span class="anti">ANTI</span>
                        <span class="racism">RACISM</span>
                    </h1>
                </div>
            </div>
            <!--end title block-->
            <div class="col-md-4">
                <div class="menu">
                    <ul>
                        <li><a href="#events">Live Events</a></li>
                        <li><a href="#resources">Learning Opportunities</a></li>
                        <li><a href="#funding">Transformative Projects</a></li>
                        <li><a href="#stories">Stories of Progress</a></li>
                    </ul>
                </div>
            </div>
            <!--end menu block-->
            <div class="col-md-5">
                <div class="etc">
                    <div class="quote">"To be antiracist is a radical choice in the face of history, requiring a radical reorientation of our consciousness."
                    </div>
                    <div class="quote-source">IBRAM X. KENDI</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tag-line">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="row intro">
            <div class="col-md-6">
                <div class="green">
                    <img src="https://archive.org/download/mohpc_sanctuaryCampus2017_DSC_9895/DSC_9895.jpg">
                </div>
            </div>
            <div class="col-md-6">
                <h2>Anti-racism at Middlebury</h2>
                <p>Ergo, si semel tristior effectus est, hilara vita amissa est? Ut non sine causa ex iis memoriae ducta sit disciplina. Satisne vobis videor pro meo iure in vestris auribus commentatus? Duo Reges: constructio interrete.
                </p>
                <p>Ecommentatus? Duo Reges: constructio interrete. Quae contraria sunt his, malane? Itaque a sapientia praecipitur se ipsam, si usus sit, sapiens ut relinquat. Respondeat totidem verbis. Praeclare hoc quidem.
                </p>
                <p>Donstructio interrete. Quae contraria sunt his, malane? Itaque a sapientia praecipitur se ipsam, si usus sit, sapiens ut relinquat. Respondeat totidem verbis. Praeclare hoc quidem.
                </p>
            </div>
        </div>
        <div class="row events" id="events">
            <div class="col-md-12 ">
                <div class="label">EVENTS</div>
            </div>
            <div class="col-md-3">
                <div class="event card h-100">
                    <div class="month">OCT</div>
                    <div class="day">14</div>
                    <div class="event-title">Speaker Series</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="event card h-100">
                    <div class="month">OCT</div>
                    <div class="day">24</div>
                    <div class="event-title">Another Thing</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="event card h-100">
                    <div class="month">NOV</div>
                    <div class="day">4</div>
                    <div class="event-title">Something Good</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="event card h-100">
                    <div class="month">NOV</div>
                    <div class="day">8</div>
                    <div class="event-title">A longer title of some sort</div>
                </div>
            </div>
            <a class="btn btn-ar btn-red" href="#">Find more events</a>
        </div>
    <!--end events-->
    <div class="row media" id="resources">
        <div class="col-md-12">
            <div class="label">RESOURCES</div>
        </div>
        <div class="col-md-4">
            <div class="media-box read">
                <div class="media-type">READ</div>
                <div class="media-list">
                    <ul>
                        <li><a href="https://www.ibramxkendi.com/how-to-be-an-antiracist">How to be an Antiracist</a></li>
                        <li><a href="#">ITEM TWO</a></li>
                        <li><a href="#">ITEM TRES</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media-box watch">
                <div class="media-type">WATCH</div>
                <div class="media-list">
                    <ul>
                        <li><a href="#">ITEM ONE</a></li>
                        <li><a href="#">ITEM TWO</a></li>
                        <li><a href="#">ITEM TRES</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media-box listen">
                <div class="media-type">LISTEN</div>
                <div class="media-list">
                    <ul>
                        <li><a href="#">ITEM ONE</a></li>
                        <li><a href="#">ITEM TWO</a></li>
                        <li><a href="#">ITEM TRES</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <a class="btn btn-ar btn-red" href="#">Find more resources</a>
    </div>
    <!--end media/resources-->
    <div class="row" id="people">
    	 <div class="col-md-12">
            <div class="label">PEOPLE</div>
        </div>
        <div class="col-md-3">
            <div class="red">
                <img class="twit" src="https://pbs.twimg.com/profile_images/911210240187731969/gEonmNwX_200x200.jpg">
            </div>
            <a href="https://twitter.com/DrIbram">Ibram X. Kendi</a>
        </div>
        <div class="col-md-3">
            <div class="green">
                <img class="twit" src="https://pbs.twimg.com/profile_images/1017569498340024320/aNtgQT1J_200x200.jpg">
            </div>
            <a href="https://twitter.com/IjeomaOluo">Ijeoma Oluo</a></li>
        </div>
         <div class="col-md-3">
            <div class="blue">
                <img class="twit" src="https://pbs.twimg.com/profile_images/840867826504204288/ZHyk1xxD_200x200.jpg">
            </div>
            <a href="https://twitter.com/renireni">Reni Eddo-Lodge</a></li>
        </div>
         <div class="col-md-3">
            <div class="yellow">
                <img class="twit" src="https://pbs.twimg.com/profile_images/1425793493017010182/X8_Ub5v-_200x200.jpg">
            </div>
            <a href="https://twitter.com/tressiemcphd">Tressie McMillan Cottom</a></li>
        </div><title></title>
    </div>
    <div class="row funding" id="funding">
        <div class="col-md-12">
            <div class="label">Funding</div>
        </div>
        <div class="col-md-4">
            <div class="funding-details">
                <h2>Opportunity 1</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae autem degendae ratio maxime quidem illis placuit quieta. Quid enim tanto opus est instrumento in optimis artibus comparandis? Itaque hic ipse iam pridem est reiectus; Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; Illis videtur, qui illud non dubitant bonum dicere -; Itaque et manendi in vita et migrandi ratio omnis iis rebus, quas supra dixi, metienda.
                </p>
                <a class="btn btn-ar btn-red" href="#">Apply</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="funding-details">
                <h2>Opportunity 2</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae autem degendae ratio maxime quidem illis placuit quieta. Quid enim tanto opus est instrumento in optimis artibus comparandis? Itaque hic ipse iam pridem est reiectus; Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; Illis videtur, qui illud non dubitant bonum dicere -; Itaque et manendi in vita et migrandi ratio omnis iis rebus, quas supra dixi, metienda.
                </p>
                <a class="btn btn-ar btn-red" href="#">Apply</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="funding-details">
                <h2>Opportunity 3</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae autem degendae ratio maxime quidem illis placuit quieta. Quid enim tanto opus est instrumento in optimis artibus comparandis? Itaque hic ipse iam pridem est reiectus; Dempta enim aeternitate nihilo beatior Iuppiter quam Epicurus; Illis videtur, qui illud non dubitant bonum dicere -; Itaque et manendi in vita et migrandi ratio omnis iis rebus, quas supra dixi, metienda.
                </p>
                <a class="btn btn-ar btn-red" href="#">Apply</a>
            </div>
        </div>
    </div>
    <!--end funding-->
    <div class="row stories" id="stories">
        <div class="col-md-12">
            <div class="label">Stories</div>
        </div>
  
    </div>
  </div>
	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
