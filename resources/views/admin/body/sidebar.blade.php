<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        SCA<span>SCO</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
<!--  -->
<div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Comptabilité</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Utilisateurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/email/inbox.html" class="nav-link">Ajouter Utilisateur</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">List des Utilisateurs</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#MRD" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Modes de Réglement</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="MRD">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.checkbooks')}}" class="nav-link">Chèques</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.billexchanges')}}" class="nav-link">Effets</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">Orders de virment</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">Espèce</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.types-transfers')}}" class="nav-link">Ajouter Mode de Payment</a>
                </li>

              </ul>
            </div>
          </li>


          
          <!-- <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Devis</span>
            </a>
          </li> -->
          <li class="nav-item nav-category">Réglements Et Factures</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Comptes</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.accounts')}}" class="nav-link">Les Comptes</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.companies')}}" class="nav-link">Les Compagnies</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.services')}}" class="nav-link">Les Services</a>
                </li>
                 <li class="nav-item">
                  <a href="{{route('all.under-accounts')}}" class="nav-link">Les Sous Comptes</a>
                </li>
                <!--<li class="nav-item">
                  <a href="pages/ui-components/buttons.html" class="nav-link">Buttons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/button-group.html" class="nav-link">Button group</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/cards.html" class="nav-link">Cards</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/carousel.html" class="nav-link">Carousel</a>
                </li>
                <li class="nav-item">
                    <a href="pages/ui-components/collapse.html" class="nav-link">Collapse</a>
                  </li>
                <li class="nav-item">
                  <a href="pages/ui-components/dropdowns.html" class="nav-link">Dropdowns</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/list-group.html" class="nav-link">List group</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/media-object.html" class="nav-link">Media object</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/navs.html" class="nav-link">Navs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/navbar.html" class="nav-link">Navbar</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/pagination.html" class="nav-link">Pagination</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/popover.html" class="nav-link">Popovers</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/progress.html" class="nav-link">Progress</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/spinners.html" class="nav-link">Spinners</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/tabs.html" class="nav-link">Tabs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Réglements</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link">Ajouter Règlements</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Liste des Règlements</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="pages/advanced-ui/sortablejs.html" class="nav-link">Règlement des Employés</a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Sweet Alert</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Fournisseurs Et Clients</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#suppSide" role="button" aria-expanded="false" aria-controls="suppSide">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Fournisseurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="suppSide">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('add.supplier')}}" class="nav-link">Ajouter Fournisseur</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.suppliers')}}" class="nav-link">Liste des Fournisseurs</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">Editors</a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/wizard.html" class="nav-link">Wizard</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="collapse" href="#ClientsSide" role="button" aria-expanded="false" aria-controls="ClientsSide">
              <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Clients</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="ClientsSide">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('add.client')}}" class="nav-link">Ajouter Client</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.clients')}}" class="nav-link">Liste des Clients</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">Flot</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/morrisjs.html" class="nav-link">Morris</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/peity.html" class="nav-link">Peity</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/sparkline.html" class="nav-link">Sparkline</a>
                </li> -->
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">Méthodes de Paiement</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/tables/basic-table.html" class="nav-link">Ajouter Méthode de Paiement</a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data-table.html" class="nav-link">List Méthode de Paiement</a>
                </li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
              <i class="link-icon" data-feather="smile"></i>
              <span class="link-title">Icons</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                </li>
                <li class="nav-item">
                  <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                </li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item nav-category">Pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Special pages</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/faq.html" class="nav-link">Faq</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/profile.html" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                  <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
              <i class="link-icon" data-feather="unlock"></i>
              <span class="link-title">Authentication</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="authPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/auth/login.html" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                  <a href="pages/auth/register.html" class="nav-link">Register</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
              <i class="link-icon" data-feather="cloud-off"></i>
              <span class="link-title">Error</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="errorPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/error/404.html" class="nav-link">404</a>
                </li>
                <li class="nav-item">
                  <a href="pages/error/500.html" class="nav-link">500</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li>
        </ul>
      </div> -->
    </nav>
    