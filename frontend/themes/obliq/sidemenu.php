<style>

.ampstart-sidebar-faq a {
    cursor: pointer;
    text-decoration: none
}
.ampstart-navbar-trigger {
    line-height: 3.5rem;
    font-size: 2rem
}
.ampstart-navbar-close {
   color: #4a4a4a;
}
.ampstart-headerbar-nav {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1
}
.ampstart-nav-search {
    -webkit-box-flex: 0.5;
    -ms-flex-positive: 0.5;
    flex-grow: 0.5
}
.ampstart-headerbar .ampstart-nav-search:active,
.ampstart-headerbar .ampstart-nav-search:focus,
.ampstart-headerbar .ampstart-nav-search:hover {
    box-shadow: none
}
.ampstart-nav-search>input {
    border: none;
    border-radius: 3px;
    line-height: normal
}
.ampstart-nav-dropdown {
    min-width: 200px
}
.ampstart-nav-dropdown amp-accordion header {
    background-color: #fff;
    border: none
}
.ampstart-nav-dropdown amp-accordion ul {
    background-color: #fff
}
.ampstart-nav-dropdown .ampstart-dropdown-item,
.ampstart-nav-dropdown .ampstart-dropdown>section>header {
    background-color: transparent;
    color: #000
}
.ampstart-nav-dropdown .ampstart-dropdown-item {
    color: #003f93
}
.ampstart-nav-dropdown .ampstart-dropdown-item a {
    color: #ffffff;
    font-weight: 900;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    bottom: 1rem;
}

.ampstart-nav-dropdown .ampstart-dropdown-item-overlay {
    width: 100%;
    height: 6rem;
    background: -webkit-linear-gradient(bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.08) 45px, transparent 60px, transparent);
    background: -moz-linear-gradient(bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.08) 45px, transparent 60px, transparent);
    background: -o-linear-gradient(bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.08) 45px, transparent 60px, transparent);
    background: linear-gradient(bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.08) 45px, transparent 60px, transparent);
    background: -ms-linear-gradient(bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.08) 45px, transparent 60px, transparent 100%);
}


.ampstart-sidebar {
    background-color: #f0f0f0;
    color: #000;
    min-width: 300px;
    width: 300px
}
.ampstart-sidebar .ampstart-icon {
    fill: #4a4a4a;
}
.ampstart-sidebar-header {
    line-height: 3.5rem;
    min-height: 3.5rem
}
.ampstart-sidebar .ampstart-faq-item,
.ampstart-sidebar .ampstart-nav-item {
    margin: 0 0 2rem
}
.ampstart-social-follow {
  height: 6rem;
  width: 100%;
}
.ampstart-sidebar .ampstart-nav-dropdown {
    margin: 0
}
.ampstart-sidebar .ampstart-navbar-trigger {
    line-height: inherit
}
.ampstart-dropdown-item {
  height: 6rem;
}
.ampstart-dropdown {
    min-width: 200px
}
.ampstart-dropdown.absolute {
    z-index: 100
}
.ampstart-dropdown.absolute>section,
.ampstart-dropdown.absolute>section>header {
    height: 100%
}
.ampstart-dropdown>section>header {
    background-color: transparent;
    border: 0;
    color: #fff
}
.ampstart-dropdown>section>header:after {
    display: inline-block;
    content: "+";
    padding: 0 0 0 1.5rem;
    color: #4a4a4a;
    float: right;
}
.ampstart-dropdown>[expanded]>header:after {
    content: "–"
}
.absolute .ampstart-dropdown-items {
    z-index: 200
}
.ampstart-dropdown-item {
    background-color: #000;
    color: #003f93;
    opacity: .9
}
.ampstart-dropdown-item:active,
.ampstart-dropdown-item:hover {
    opacity: 1
}


</style>

<!-- Start Sidebar -->
<amp-sidebar id="header-sidebar" class="ampstart-sidebar  " layout="nodisplay">
  <div class="ampstart-sidebar-inner relative">
  <div class="flex justify-start items-center ampstart-sidebar-header">
    <div role="button" aria-label="close sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger items-start px3 ampstart-navbar-close">✕</div>
  </div>
  <nav class="ampstart-sidebar-nav ampstart-nav">
    <ul class="list-reset m0 p0 ampstart-label">
      <li class="ampstart-nav-item ampstart-nav-dropdown relative">
        <!-- Start Dropdown-inline -->
        <amp-accordion layout="container" disable-session-states="" class="ampstart-dropdown">
          <section>
            <header class="px3 py3">Categories</header>
            <ul class="ampstart-dropdown-items list-reset m0 p0">
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/zebras.jpg')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Animals</a>
                </div>
              </li>
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/cow.png')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Photo of the day</a>
                </div>
              </li>
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/zebras.jpg')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Animals</a>
                </div>
              </li>
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/cow.png')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Photo of the day</a>
                </div>
              </li>
            </ul>
          </section>
        </amp-accordion>
        <!-- End Dropdown-inline -->
      </li>
      <li class="ampstart-nav-item ampstart-nav-dropdown relative">
        <!-- Start Dropdown-inline -->
        <amp-accordion layout="container" disable-session-states="" class="ampstart-dropdown">
          <section>
            <header class="px3 py3">Static pages</header>
            <ul class="ampstart-dropdown-items list-reset m0 p0">
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/zebras.jpg')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Animals</a>
                </div>
              </li>
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/cow.png')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Photo of the day</a>
                </div>
              </li>
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/zebras.jpg')">
                <div class="ampstart-dropdown-item-overlay absolute">
                  <a href="./post-list.php" class="text-decoration-none absolute">Animals</a>
                </div>
              </li>
              <li class="ampstart-dropdown-item bg-cover" style="background-image:url('../img/article/cow.png')">
                <div class="ampstart-dropdown-item-overlay absolute">
                    <a href="./post-list.php" class="text-decoration-none absolute">Photo of the day</a>
                </div>
              </li>
            </ul>
          </section>
        </amp-accordion>
        <!-- End Dropdown-inline -->
      </li>
    </ul>
  </nav>



  <ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0">
      <li class="mr2">
          <a href="#" target="_blank" class="inline-block" aria-label="Link to AMP HTML Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="22.2" viewbox="0 0 53 49"><title>Twitter</title><path d="M45 6.9c-1.6 1-3.3 1.6-5.2 2-1.5-1.6-3.6-2.6-5.9-2.6-4.5 0-8.2 3.7-8.2 8.3 0 .6.1 1.3.2 1.9-6.8-.4-12.8-3.7-16.8-8.7C8.4 9 8 10.5 8 12c0 2.8 1.4 5.4 3.6 6.9-1.3-.1-2.6-.5-3.7-1.1v.1c0 4 2.8 7.4 6.6 8.1-.7.2-1.5.3-2.2.3-.5 0-1 0-1.5-.1 1 3.3 4 5.7 7.6 5.7-2.8 2.2-6.3 3.6-10.2 3.6-.6 0-1.3-.1-1.9-.1 3.6 2.3 7.9 3.7 12.5 3.7 15.1 0 23.3-12.6 23.3-23.6 0-.3 0-.7-.1-1 1.6-1.2 3-2.7 4.1-4.3-1.4.6-3 1.1-4.7 1.3 1.7-1 3-2.7 3.6-4.6" class="ampstart-icon ampstart-icon-twitter"></path></svg></a>
      </li>
      <li class="mr2">
          <a href="#" target="_blank" class="inline-block" aria-label="Link to AMP HTML Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.6" viewbox="0 0 56 55"><title>Facebook</title><path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path></svg></a>
      </li>
      <li class="mr2">
          <a href="#" target="_blank" class="inline-block" aria-label="Link to AMP HTML Instagram"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 54 54"><title>instagram</title><path d="M27.2 6.1c-5.1 0-5.8 0-7.8.1s-3.4.4-4.6.9c-1.2.5-2.3 1.1-3.3 2.2-1.1 1-1.7 2.1-2.2 3.3-.5 1.2-.8 2.6-.9 4.6-.1 2-.1 2.7-.1 7.8s0 5.8.1 7.8.4 3.4.9 4.6c.5 1.2 1.1 2.3 2.2 3.3 1 1.1 2.1 1.7 3.3 2.2 1.2.5 2.6.8 4.6.9 2 .1 2.7.1 7.8.1s5.8 0 7.8-.1 3.4-.4 4.6-.9c1.2-.5 2.3-1.1 3.3-2.2 1.1-1 1.7-2.1 2.2-3.3.5-1.2.8-2.6.9-4.6.1-2 .1-2.7.1-7.8s0-5.8-.1-7.8-.4-3.4-.9-4.6c-.5-1.2-1.1-2.3-2.2-3.3-1-1.1-2.1-1.7-3.3-2.2-1.2-.5-2.6-.8-4.6-.9-2-.1-2.7-.1-7.8-.1zm0 3.4c5 0 5.6 0 7.6.1 1.9.1 2.9.4 3.5.7.9.3 1.6.7 2.2 1.4.7.6 1.1 1.3 1.4 2.2.3.6.6 1.6.7 3.5.1 2 .1 2.6.1 7.6s0 5.6-.1 7.6c-.1 1.9-.4 2.9-.7 3.5-.3.9-.7 1.6-1.4 2.2-.7.7-1.3 1.1-2.2 1.4-.6.3-1.7.6-3.5.7-2 .1-2.6.1-7.6.1-5.1 0-5.7 0-7.7-.1-1.8-.1-2.9-.4-3.5-.7-.9-.3-1.5-.7-2.2-1.4-.7-.7-1.1-1.3-1.4-2.2-.3-.6-.6-1.7-.7-3.5 0-2-.1-2.6-.1-7.6 0-5.1.1-5.7.1-7.7.1-1.8.4-2.8.7-3.5.3-.9.7-1.5 1.4-2.2.7-.6 1.3-1.1 2.2-1.4.6-.3 1.6-.6 3.5-.7h7.7zm0 5.8c-5.4 0-9.7 4.3-9.7 9.7 0 5.4 4.3 9.7 9.7 9.7 5.4 0 9.7-4.3 9.7-9.7 0-5.4-4.3-9.7-9.7-9.7zm0 16c-3.5 0-6.3-2.8-6.3-6.3s2.8-6.3 6.3-6.3 6.3 2.8 6.3 6.3-2.8 6.3-6.3 6.3zm12.4-16.4c0 1.3-1.1 2.3-2.3 2.3-1.3 0-2.3-1-2.3-2.3 0-1.2 1-2.3 2.3-2.3 1.2 0 2.3 1.1 2.3 2.3z" class="ampstart-icon ampstart-icon-instagram"></path></svg></a>
      </li>
      <li class="mr2">
          <a href="#" target="_blank" class="inline-block" aria-label="Link to AMP HTML E-mail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="18.4" viewbox="0 0 56 43"><title>email</title><path d="M10.5 6.4C9.1 6.4 8 7.5 8 8.9v21.3c0 1.3 1.1 2.5 2.5 2.5h34.9c1.4 0 2.5-1.2 2.5-2.5V8.9c0-1.4-1.1-2.5-2.5-2.5H10.5zm2.1 2.5h30.7L27.9 22.3 12.6 8.9zm-2.1 1.4l16.6 14.6c.5.4 1.2.4 1.7 0l16.6-14.6v19.9H10.5V10.3z" class="ampstart-icon ampstart-icon-email"></path></svg></a>
      </li>
  </ul>
  </div>

</amp-sidebar>
<!-- End Sidebar -->
