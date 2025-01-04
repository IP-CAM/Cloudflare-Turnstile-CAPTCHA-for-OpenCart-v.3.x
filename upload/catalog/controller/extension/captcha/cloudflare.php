<?php
class ControllerExtensionCaptchaCloudflare extends Controller {
    public function index($error = array()) {
        $this->load->language('extension/captcha/cloudflare');

        if (isset($error['captcha'])) {
            $data['error_captcha'] = $error['captcha'];
        } else {
            $data['error_captcha'] = '';
        }

        $data['site_key'] = $this->config->get('captcha_cloudflare_site_key');

        return $this->load->view('extension/captcha/cloudflare', $data);
    }

    public function validate() {
        if (empty($this->request->post['cf-turnstile-response'])) {
            return false;
        }

        $secret_key = $this->config->get('captcha_cloudflare_secret_key');
        $response = $this->request->post['cf-turnstile-response'];
        $ip = $this->request->server['REMOTE_ADDR'];

        $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
        $data = array(
            'secret' => $secret_key,
            'response' => $response,
            'remoteip' => $ip
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($result, true);

        return isset($status['success']) && $status['success'] === true;
    }
} 