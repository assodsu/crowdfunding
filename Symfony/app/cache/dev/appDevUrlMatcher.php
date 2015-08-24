<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/thread')) {
            // cf_comment_thread_show
            if (preg_match('#^/thread/(?P<id>\\d*)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_thread_show')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\ThreadController::showAction',));
            }

            // cf_comment_comment_new
            if (preg_match('#^/thread/(?P<id>[^/]++)/comment/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_comment_new')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\CommentController::newAction',));
            }

            // cf_comment_comment_update
            if (preg_match('#^/thread/(?P<id>[^/]++)/comment/update$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_comment_update')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\CommentController::updateAction',));
            }

            // cf_comment_comment_reply
            if (preg_match('#^/thread/(?P<id>[^/]++)/comment/reply/(?P<comment_id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_comment_reply')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\CommentController::replyAction',));
            }

            // cf_comment_comment_reply_update
            if (preg_match('#^/thread/(?P<id>[^/]++)/comment/reply/(?P<comment_id>[^/]++)/update$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_comment_reply_update')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\CommentController::replyUpdateAction',));
            }

            // cf_comment_comment_report
            if (preg_match('#^/thread/(?P<id>[^/]++)/comment/report/(?P<comment_id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_comment_report')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\CommentController::reportAction',));
            }

        }

        if (0 === strpos($pathinfo, '/comment')) {
            // cf_comment_comment_report_update
            if (0 === strpos($pathinfo, '/comment/report') && preg_match('#^/comment/report/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_comment_comment_report_update')), array (  '_controller' => 'CF\\CommentBundle\\Controller\\CommentController::reportUpdateAction',));
            }

            // cf_site_commentcamarche
            if ($pathinfo === '/comment-ca-marche') {
                return array (  '_controller' => 'CF\\SiteBundle\\Controller\\PagesController::commentcamarcheAction',  '_route' => 'cf_site_commentcamarche',);
            }

        }

        // cf_site_partenaires
        if ($pathinfo === '/partenaires') {
            return array (  '_controller' => 'CF\\SiteBundle\\Controller\\PagesController::partenairesAction',  '_route' => 'cf_site_partenaires',);
        }

        // cf_site_contact
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'CF\\SiteBundle\\Controller\\PagesController::contactAction',  '_route' => 'cf_site_contact',);
        }

        // cf_site_developpeurs
        if ($pathinfo === '/developpeurs') {
            return array (  '_controller' => 'CF\\SiteBundle\\Controller\\PagesController::developpeursAction',  '_route' => 'cf_site_developpeurs',);
        }

        // cf_site_conditions
        if ($pathinfo === '/conditions') {
            return array (  '_controller' => 'CF\\SiteBundle\\Controller\\PagesController::conditionsAction',  '_route' => 'cf_site_conditions',);
        }

        // cf_site_apropos
        if ($pathinfo === '/a-propos') {
            return array (  '_controller' => 'CF\\SiteBundle\\Controller\\PagesController::aproposAction',  '_route' => 'cf_site_apropos',);
        }

        // cf_badge_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_badge_homepage')), array (  '_controller' => 'CF\\BadgeBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/message')) {
            // cf_message_add
            if (0 === strpos($pathinfo, '/message/ajouter') && preg_match('#^/message/ajouter/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_message_add')), array (  '_controller' => 'CF\\MessageBundle\\Controller\\MessageController::addAction',));
            }

            // cf_message_update_ajax
            if (0 === strpos($pathinfo, '/message/update') && preg_match('#^/message/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_cf_message_update_ajax;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_message_update_ajax')), array (  '_controller' => 'CF\\MessageBundle\\Controller\\MessageController::updateAction',));
            }
            not_cf_message_update_ajax:

        }

        if (0 === strpos($pathinfo, '/conversation')) {
            // cf_conversation_list
            if ($pathinfo === '/conversation/liste') {
                return array (  '_controller' => 'CF\\MessageBundle\\Controller\\ConversationController::listAction',  '_route' => 'cf_conversation_list',);
            }

            // cf_conversation_show
            if (preg_match('#^/conversation/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_conversation_show')), array (  '_controller' => 'CF\\MessageBundle\\Controller\\ConversationController::showAction',));
            }

        }

        // cf_notification
        if ($pathinfo === '/notifications') {
            return array (  '_controller' => 'CF\\NotificationBundle\\Controller\\NotificationController::indexAction',  '_route' => 'cf_notification',);
        }

        if (0 === strpos($pathinfo, '/connexion')) {
            // fos_user_security_login
            if ($pathinfo === '/connexion') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
            }

            // fos_user_security_check
            if ($pathinfo === '/connexion_check') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
            }

        }

        // fos_user_security_logout
        if ($pathinfo === '/deconnexion') {
            return array (  '_controller' => 'CF\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profil')) {
            // fos_user_profile_edit
            if ($pathinfo === '/profil/editer') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

            // fos_user_profile_projects
            if ($pathinfo === '/profil/projets') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::projectsAction',  '_route' => 'fos_user_profile_projects',);
            }

            // fos_user_profile_messages
            if ($pathinfo === '/profil/messages') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::messagesAction',  '_route' => 'fos_user_profile_messages',);
            }

            // fos_user_profile_badges
            if ($pathinfo === '/profil/badges') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::badgesAction',  '_route' => 'fos_user_profile_badges',);
            }

            if (0 === strpos($pathinfo, '/profil/projets-')) {
                if (0 === strpos($pathinfo, '/profil/projets-s')) {
                    // cf_user_projetsSuivis
                    if ($pathinfo === '/profil/projets-suivis') {
                        return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::projetsSuivisAction',  '_route' => 'cf_user_projetsSuivis',);
                    }

                    // cf_user_projetsSoutenus
                    if ($pathinfo === '/profil/projets-soutenus') {
                        return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::projetsSoutenusAction',  '_route' => 'cf_user_projetsSoutenus',);
                    }

                }

                // cf_user_projetsFini
                if ($pathinfo === '/profil/projets-fini') {
                    return array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::projetsFiniAction',  '_route' => 'cf_user_projetsFini',);
                }

            }

            // fos_user_profile_show
            if (0 === strpos($pathinfo, '/profil/voir') && preg_match('#^/profil/voir/(?P<slug>[a-zA-Z-0-9]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_profile_show')), array (  '_controller' => 'CF\\UserBundle\\Controller\\ProfileController::showAction',));
            }
            not_fos_user_profile_show:

        }

        if (0 === strpos($pathinfo, '/inscription')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/inscription') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            if (0 === strpos($pathinfo, '/inscription/c')) {
                // fos_user_registration_check_email
                if ($pathinfo === '/inscription/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                }
                not_fos_user_registration_check_email:

                if (0 === strpos($pathinfo, '/inscription/confirm')) {
                    // fos_user_registration_confirm
                    if (preg_match('#^/inscription/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_confirm;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                    }
                    not_fos_user_registration_confirm:

                    // fos_user_registration_confirmed
                    if ($pathinfo === '/inscription/confirmed') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_confirmed;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                    }
                    not_fos_user_registration_confirmed:

                }

            }

            // association_registration
            if ($pathinfo === '/inscription/association') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\RegistrationAssociationController::registerAction',  '_route' => 'association_registration',);
            }

            // entreprise_registration
            if ($pathinfo === '/inscription/entreprise') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\RegistrationEntrepriseController::registerAction',  '_route' => 'entreprise_registration',);
            }

            // particulier_registration
            if ($pathinfo === '/inscription/particulier') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\RegistrationParticulierController::registerAction',  '_route' => 'particulier_registration',);
            }

            // inscription_confirmee
            if ($pathinfo === '/inscription/confirmation') {
                return array (  '_controller' => 'CF\\UserBundle\\Controller\\RegistrationConfirmController::confirmedAction',  '_route' => 'inscription_confirmee',);
            }

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/profil/modifier-mdp') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'CF\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // cf_main_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'cf_main_homepage');
            }

            return array (  '_controller' => 'CF\\MainBundle\\Controller\\PageController::indexAction',  '_route' => 'cf_main_homepage',);
        }

        if (0 === strpos($pathinfo, '/projet')) {
            // cf_main_project
            if (0 === strpos($pathinfo, '/projet/voir') && preg_match('#^/projet/voir/(?P<slug>[a-zA-Z0-9-]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cf_main_project;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_project')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::showAction',));
            }
            not_cf_main_project:

            // cf_main_addProjects
            if ($pathinfo === '/projet/creer') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_cf_main_addProjects;
                }

                return array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::addAction',  '_route' => 'cf_main_addProjects',);
            }
            not_cf_main_addProjects:

            // cf_main_participate
            if (preg_match('#^/projet/(?P<id>\\d+)/participer$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_cf_main_participate;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_participate')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::participateAction',));
            }
            not_cf_main_participate:

            // cf_main_modifier_projet
            if (0 === strpos($pathinfo, '/projet/modifier') && preg_match('#^/projet/modifier/(?P<slug>[a-zA-Z0-9-]+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_modifier_projet')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::modifierAction',));
            }

            if (0 === strpos($pathinfo, '/projet/s')) {
                // cf_main_suivre_projet
                if (0 === strpos($pathinfo, '/projet/suivre') && preg_match('#^/projet/suivre/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_suivre_projet')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::suivreProjetAction',));
                }

                // cf_main_not_suivre_projet
                if (0 === strpos($pathinfo, '/projet/stop-suivre') && preg_match('#^/projet/stop\\-suivre/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_not_suivre_projet')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::notSuivreProjetAction',));
                }

            }

            if (0 === strpos($pathinfo, '/projet/mises-a-jours')) {
                // cf_main_rediger_actu
                if (0 === strpos($pathinfo, '/projet/mises-a-jours/rediger') && preg_match('#^/projet/mises\\-a\\-jours/rediger/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_rediger_actu')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ActualiteController::redigerAction',));
                }

                // cf_main_edit_actu
                if (0 === strpos($pathinfo, '/projet/mises-a-jours/editer') && preg_match('#^/projet/mises\\-a\\-jours/editer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_edit_actu')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ActualiteController::editerAction',));
                }

                // cf_main_delete_actu
                if (0 === strpos($pathinfo, '/projet/mises-a-jours/supprimer') && preg_match('#^/projet/mises\\-a\\-jours/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_delete_actu')), array (  '_controller' => 'CF\\MainBundle\\Controller\\ActualiteController::supprimerAction',));
                }

            }

            if (0 === strpos($pathinfo, '/projet/box')) {
                // cf_main_rediger_box
                if (0 === strpos($pathinfo, '/projet/box/rediger') && preg_match('#^/projet/box/rediger/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_rediger_box')), array (  '_controller' => 'CF\\MainBundle\\Controller\\BoxController::redigerAction',));
                }

                // cf_main_edit_box
                if (0 === strpos($pathinfo, '/projet/box/editer') && preg_match('#^/projet/box/editer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_edit_box')), array (  '_controller' => 'CF\\MainBundle\\Controller\\BoxController::editerAction',));
                }

                // cf_main_delete_box
                if (0 === strpos($pathinfo, '/projet/box/supprimer') && preg_match('#^/projet/box/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cf_main_delete_box')), array (  '_controller' => 'CF\\MainBundle\\Controller\\BoxController::supprimerAction',));
                }

            }

            if (0 === strpos($pathinfo, '/projets')) {
                if (0 === strpos($pathinfo, '/projets/tous')) {
                    // cf_main_allProjects
                    if ($pathinfo === '/projets/tous') {
                        return array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::showAllAction',  '_route' => 'cf_main_allProjects',);
                    }

                    // cf_main_updateProjects
                    if ($pathinfo === '/projets/tous/update') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_cf_main_updateProjects;
                        }

                        return array (  '_controller' => 'CF\\MainBundle\\Controller\\ProjectController::updateAction',  '_route' => 'cf_main_updateProjects',);
                    }
                    not_cf_main_updateProjects:

                }

                if (0 === strpos($pathinfo, '/projets/recherche')) {
                    // cf_main_recherche
                    if ($pathinfo === '/projets/recherche') {
                        return array (  '_controller' => 'CF\\MainBundle\\Controller\\RechercheController::searchAction',  '_route' => 'cf_main_recherche',);
                    }

                    // cf_main_rechercheUpdate
                    if ($pathinfo === '/projets/recherche/update') {
                        return array (  '_controller' => 'CF\\MainBundle\\Controller\\RechercheController::updateSearchAction',  '_route' => 'cf_main_rechercheUpdate',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            // sonata_admin_search
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
            }

            if (0 === strpos($pathinfo, '/admin/c')) {
                // sonata_admin_retrieve_autocomplete_items
                if ($pathinfo === '/admin/core/get-autocomplete-items') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveAutocompleteItemsAction',  '_route' => 'sonata_admin_retrieve_autocomplete_items',);
                }

                if (0 === strpos($pathinfo, '/admin/cf')) {
                    if (0 === strpos($pathinfo, '/admin/cf/main')) {
                        if (0 === strpos($pathinfo, '/admin/cf/main/projet')) {
                            // admin_cf_main_projet_list
                            if ($pathinfo === '/admin/cf/main/projet/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_list',  '_route' => 'admin_cf_main_projet_list',);
                            }

                            // admin_cf_main_projet_create
                            if ($pathinfo === '/admin/cf/main/projet/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_create',  '_route' => 'admin_cf_main_projet_create',);
                            }

                            // admin_cf_main_projet_batch
                            if ($pathinfo === '/admin/cf/main/projet/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_batch',  '_route' => 'admin_cf_main_projet_batch',);
                            }

                            // admin_cf_main_projet_edit
                            if (preg_match('#^/admin/cf/main/projet/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_projet_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_edit',));
                            }

                            // admin_cf_main_projet_delete
                            if (preg_match('#^/admin/cf/main/projet/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_projet_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_delete',));
                            }

                            // admin_cf_main_projet_show
                            if (preg_match('#^/admin/cf/main/projet/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_projet_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_show',));
                            }

                            // admin_cf_main_projet_export
                            if ($pathinfo === '/admin/cf/main/projet/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.projet',  '_sonata_name' => 'admin_cf_main_projet_export',  '_route' => 'admin_cf_main_projet_export',);
                            }

                            if (0 === strpos($pathinfo, '/admin/cf/main/projetaccueil')) {
                                // admin_cf_main_projetaccueil_list
                                if ($pathinfo === '/admin/cf/main/projetaccueil/list') {
                                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_list',  '_route' => 'admin_cf_main_projetaccueil_list',);
                                }

                                // admin_cf_main_projetaccueil_create
                                if ($pathinfo === '/admin/cf/main/projetaccueil/create') {
                                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_create',  '_route' => 'admin_cf_main_projetaccueil_create',);
                                }

                                // admin_cf_main_projetaccueil_batch
                                if ($pathinfo === '/admin/cf/main/projetaccueil/batch') {
                                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_batch',  '_route' => 'admin_cf_main_projetaccueil_batch',);
                                }

                                // admin_cf_main_projetaccueil_edit
                                if (preg_match('#^/admin/cf/main/projetaccueil/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_projetaccueil_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_edit',));
                                }

                                // admin_cf_main_projetaccueil_delete
                                if (preg_match('#^/admin/cf/main/projetaccueil/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_projetaccueil_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_delete',));
                                }

                                // admin_cf_main_projetaccueil_show
                                if (preg_match('#^/admin/cf/main/projetaccueil/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_projetaccueil_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_show',));
                                }

                                // admin_cf_main_projetaccueil_export
                                if ($pathinfo === '/admin/cf/main/projetaccueil/export') {
                                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.projet_accueil',  '_sonata_name' => 'admin_cf_main_projetaccueil_export',  '_route' => 'admin_cf_main_projetaccueil_export',);
                                }

                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/cf/main/tags')) {
                            // admin_cf_main_tags_list
                            if ($pathinfo === '/admin/cf/main/tags/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_list',  '_route' => 'admin_cf_main_tags_list',);
                            }

                            // admin_cf_main_tags_create
                            if ($pathinfo === '/admin/cf/main/tags/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_create',  '_route' => 'admin_cf_main_tags_create',);
                            }

                            // admin_cf_main_tags_batch
                            if ($pathinfo === '/admin/cf/main/tags/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_batch',  '_route' => 'admin_cf_main_tags_batch',);
                            }

                            // admin_cf_main_tags_edit
                            if (preg_match('#^/admin/cf/main/tags/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_tags_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_edit',));
                            }

                            // admin_cf_main_tags_delete
                            if (preg_match('#^/admin/cf/main/tags/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_tags_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_delete',));
                            }

                            // admin_cf_main_tags_show
                            if (preg_match('#^/admin/cf/main/tags/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_tags_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_show',));
                            }

                            // admin_cf_main_tags_export
                            if ($pathinfo === '/admin/cf/main/tags/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.tags',  '_sonata_name' => 'admin_cf_main_tags_export',  '_route' => 'admin_cf_main_tags_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/cf/main/selecteur')) {
                            // admin_cf_main_selecteur_list
                            if ($pathinfo === '/admin/cf/main/selecteur/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_list',  '_route' => 'admin_cf_main_selecteur_list',);
                            }

                            // admin_cf_main_selecteur_create
                            if ($pathinfo === '/admin/cf/main/selecteur/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_create',  '_route' => 'admin_cf_main_selecteur_create',);
                            }

                            // admin_cf_main_selecteur_batch
                            if ($pathinfo === '/admin/cf/main/selecteur/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_batch',  '_route' => 'admin_cf_main_selecteur_batch',);
                            }

                            // admin_cf_main_selecteur_edit
                            if (preg_match('#^/admin/cf/main/selecteur/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_selecteur_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_edit',));
                            }

                            // admin_cf_main_selecteur_delete
                            if (preg_match('#^/admin/cf/main/selecteur/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_selecteur_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_delete',));
                            }

                            // admin_cf_main_selecteur_show
                            if (preg_match('#^/admin/cf/main/selecteur/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_main_selecteur_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_show',));
                            }

                            // admin_cf_main_selecteur_export
                            if ($pathinfo === '/admin/cf/main/selecteur/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.selecteur',  '_sonata_name' => 'admin_cf_main_selecteur_export',  '_route' => 'admin_cf_main_selecteur_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/cf/notification/notification')) {
                        // admin_cf_notification_notification_list
                        if ($pathinfo === '/admin/cf/notification/notification/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_list',  '_route' => 'admin_cf_notification_notification_list',);
                        }

                        // admin_cf_notification_notification_create
                        if ($pathinfo === '/admin/cf/notification/notification/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_create',  '_route' => 'admin_cf_notification_notification_create',);
                        }

                        // admin_cf_notification_notification_batch
                        if ($pathinfo === '/admin/cf/notification/notification/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_batch',  '_route' => 'admin_cf_notification_notification_batch',);
                        }

                        // admin_cf_notification_notification_edit
                        if (preg_match('#^/admin/cf/notification/notification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_notification_notification_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_edit',));
                        }

                        // admin_cf_notification_notification_delete
                        if (preg_match('#^/admin/cf/notification/notification/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_notification_notification_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_delete',));
                        }

                        // admin_cf_notification_notification_show
                        if (preg_match('#^/admin/cf/notification/notification/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_notification_notification_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_show',));
                        }

                        // admin_cf_notification_notification_export
                        if ($pathinfo === '/admin/cf/notification/notification/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.notif',  '_sonata_name' => 'admin_cf_notification_notification_export',  '_route' => 'admin_cf_notification_notification_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/cf/user')) {
                        if (0 === strpos($pathinfo, '/admin/cf/user/association')) {
                            // admin_cf_user_association_list
                            if ($pathinfo === '/admin/cf/user/association/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_list',  '_route' => 'admin_cf_user_association_list',);
                            }

                            // admin_cf_user_association_create
                            if ($pathinfo === '/admin/cf/user/association/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_create',  '_route' => 'admin_cf_user_association_create',);
                            }

                            // admin_cf_user_association_batch
                            if ($pathinfo === '/admin/cf/user/association/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_batch',  '_route' => 'admin_cf_user_association_batch',);
                            }

                            // admin_cf_user_association_edit
                            if (preg_match('#^/admin/cf/user/association/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_association_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_edit',));
                            }

                            // admin_cf_user_association_delete
                            if (preg_match('#^/admin/cf/user/association/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_association_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_delete',));
                            }

                            // admin_cf_user_association_show
                            if (preg_match('#^/admin/cf/user/association/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_association_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_show',));
                            }

                            // admin_cf_user_association_export
                            if ($pathinfo === '/admin/cf/user/association/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.association',  '_sonata_name' => 'admin_cf_user_association_export',  '_route' => 'admin_cf_user_association_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/cf/user/particulier')) {
                            // admin_cf_user_particulier_list
                            if ($pathinfo === '/admin/cf/user/particulier/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_list',  '_route' => 'admin_cf_user_particulier_list',);
                            }

                            // admin_cf_user_particulier_create
                            if ($pathinfo === '/admin/cf/user/particulier/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_create',  '_route' => 'admin_cf_user_particulier_create',);
                            }

                            // admin_cf_user_particulier_batch
                            if ($pathinfo === '/admin/cf/user/particulier/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_batch',  '_route' => 'admin_cf_user_particulier_batch',);
                            }

                            // admin_cf_user_particulier_edit
                            if (preg_match('#^/admin/cf/user/particulier/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_particulier_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_edit',));
                            }

                            // admin_cf_user_particulier_delete
                            if (preg_match('#^/admin/cf/user/particulier/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_particulier_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_delete',));
                            }

                            // admin_cf_user_particulier_show
                            if (preg_match('#^/admin/cf/user/particulier/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_particulier_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_show',));
                            }

                            // admin_cf_user_particulier_export
                            if ($pathinfo === '/admin/cf/user/particulier/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.particulier',  '_sonata_name' => 'admin_cf_user_particulier_export',  '_route' => 'admin_cf_user_particulier_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/cf/user/entreprise')) {
                            // admin_cf_user_entreprise_list
                            if ($pathinfo === '/admin/cf/user/entreprise/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_list',  '_route' => 'admin_cf_user_entreprise_list',);
                            }

                            // admin_cf_user_entreprise_create
                            if ($pathinfo === '/admin/cf/user/entreprise/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_create',  '_route' => 'admin_cf_user_entreprise_create',);
                            }

                            // admin_cf_user_entreprise_batch
                            if ($pathinfo === '/admin/cf/user/entreprise/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_batch',  '_route' => 'admin_cf_user_entreprise_batch',);
                            }

                            // admin_cf_user_entreprise_edit
                            if (preg_match('#^/admin/cf/user/entreprise/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_entreprise_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_edit',));
                            }

                            // admin_cf_user_entreprise_delete
                            if (preg_match('#^/admin/cf/user/entreprise/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_entreprise_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_delete',));
                            }

                            // admin_cf_user_entreprise_show
                            if (preg_match('#^/admin/cf/user/entreprise/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_user_entreprise_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_show',));
                            }

                            // admin_cf_user_entreprise_export
                            if ($pathinfo === '/admin/cf/user/entreprise/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.entreprise',  '_sonata_name' => 'admin_cf_user_entreprise_export',  '_route' => 'admin_cf_user_entreprise_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/cf/badge/badge')) {
                        // admin_cf_badge_badge_list
                        if ($pathinfo === '/admin/cf/badge/badge/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_list',  '_route' => 'admin_cf_badge_badge_list',);
                        }

                        // admin_cf_badge_badge_create
                        if ($pathinfo === '/admin/cf/badge/badge/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_create',  '_route' => 'admin_cf_badge_badge_create',);
                        }

                        // admin_cf_badge_badge_batch
                        if ($pathinfo === '/admin/cf/badge/badge/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_batch',  '_route' => 'admin_cf_badge_badge_batch',);
                        }

                        // admin_cf_badge_badge_edit
                        if (preg_match('#^/admin/cf/badge/badge/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_badge_badge_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_edit',));
                        }

                        // admin_cf_badge_badge_delete
                        if (preg_match('#^/admin/cf/badge/badge/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_badge_badge_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_delete',));
                        }

                        // admin_cf_badge_badge_show
                        if (preg_match('#^/admin/cf/badge/badge/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_badge_badge_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_show',));
                        }

                        // admin_cf_badge_badge_export
                        if ($pathinfo === '/admin/cf/badge/badge/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.badge',  '_sonata_name' => 'admin_cf_badge_badge_export',  '_route' => 'admin_cf_badge_badge_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/cf/comment/comment')) {
                        // admin_cf_comment_comment_list
                        if ($pathinfo === '/admin/cf/comment/comment/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_list',  '_route' => 'admin_cf_comment_comment_list',);
                        }

                        // admin_cf_comment_comment_create
                        if ($pathinfo === '/admin/cf/comment/comment/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_create',  '_route' => 'admin_cf_comment_comment_create',);
                        }

                        // admin_cf_comment_comment_batch
                        if ($pathinfo === '/admin/cf/comment/comment/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_batch',  '_route' => 'admin_cf_comment_comment_batch',);
                        }

                        // admin_cf_comment_comment_edit
                        if (preg_match('#^/admin/cf/comment/comment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_comment_comment_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_edit',));
                        }

                        // admin_cf_comment_comment_delete
                        if (preg_match('#^/admin/cf/comment/comment/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_comment_comment_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_delete',));
                        }

                        // admin_cf_comment_comment_show
                        if (preg_match('#^/admin/cf/comment/comment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cf_comment_comment_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_show',));
                        }

                        // admin_cf_comment_comment_export
                        if ($pathinfo === '/admin/cf/comment/comment/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.comment',  '_sonata_name' => 'admin_cf_comment_comment_export',  '_route' => 'admin_cf_comment_comment_export',);
                        }

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/_console')) {
            // console
            if (rtrim($pathinfo, '/') === '/_console') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_console;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'console');
                }

                return array (  '_controller' => 'CoreSphere\\ConsoleBundle\\Controller\\ConsoleController::consoleAction',  '_route' => 'console',);
            }
            not_console:

            // console_exec
            if (0 === strpos($pathinfo, '/_console/commands') && preg_match('#^/_console/commands(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_console_exec;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'console_exec')), array (  '_controller' => 'CoreSphere\\ConsoleBundle\\Controller\\ConsoleController::execAction',  '_format' => 'json',));
            }
            not_console_exec:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
