<?php
class ControllerExtensionCaptchaCloudflare extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/captcha/cloudflare');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('captcha_cloudflare', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=captcha', true));
        }

        $data['heading_title'] = $this->language->get('heading_title');
        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_site_key'] = $this->language->get('entry_site_key');
        $data['entry_secret_key'] = $this->language->get('entry_secret_key');
        $data['entry_status'] = $this->language->get('entry_status');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/captcha/cloudflare', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=captcha', true);

        $data['captcha_cloudflare_site_key'] = $this->config->get('captcha_cloudflare_site_key');
        $data['captcha_cloudflare_secret_key'] = $this->config->get('captcha_cloudflare_secret_key');
        $data['captcha_cloudflare_status'] = $this->config->get('captcha_cloudflare_status');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/captcha/cloudflare', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/captcha/cloudflare')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }
} 