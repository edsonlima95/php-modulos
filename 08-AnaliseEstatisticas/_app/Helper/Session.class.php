<?php

class Session {

    private $data;
    private $cache;
    private $traffic;
    private $browser;

    function __construct($cache = null) {
        session_start(); //inicia a sessao.
        $this->checkSession($cache);
    }

    //Verifica todos os metodos da sessao.
    private function checkSession($cache = null) {
        $this->data = date('Y-m-d');
        $this->cache = ((int) $cache ? $cache : 20);
        //verifica a existencia da sessao.
        if (empty($_SESSION['useronline'])):
            $this->setTrafico();
            $this->setSession();
            $this->checkBrowser();
            $this->setUsuario();
            $this->updateBrowser();
        else:
            $this->trafficUpdate();
            $this->sessaonUpdate();
            $this->checkBrowser();
            $this->updateUsuario();

        endif;
        $this->data = null;
    }

    //inicia a sessao.
    private function setSession() {
        $_SESSION['useronline'] = [
            "online_session" => session_id(),
            "online_startview" => date('Y-m-d H:i:s'),
            "online_endview" => date('Y-m-d H:i:s', strtotime("+{$this->cache}minutes")),
            "online_ip" => filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP),
            "online_url" => filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT),
            "online_agent" => filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_DEFAULT),
        ];
    }

    //atualiza a sessao de usuarios.
    private function sessaonUpdate() {
        $_SESSION['useronline']['online_endview'] = date('Y-m-d H:i:s', strtotime("+{$this->cache}minutes"));
        $_SESSION['useronline']['online_url'] = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
    }

    //verifica e cria o trafico na tabela
    private function setTrafico() {
        $this->getTrafico();
        if (!$this->traffic):
            $arrTrafico = [
                "siteviews_date" => "$this->data",
                "siteviews_users" => 1,
                "siteviews_views" => 1,
                "siteviews_pages" => 1
            ];
            $createSiteViews = new Create();
            $createSiteViews->ExeCreate('ws_siteviews', $arrTrafico);
        else:
            //Atualiza esses campos.
            if (!$this->getCookie()):
                $arrTrafico = [
                    "siteviews_users" => $this->traffic['siteviews_users'] + 1,
                    "siteviews_views" => $this->traffic['siteviews_views'] + 1,
                    "siteviews_pages" => $this->traffic['siteviews_pages'] + 1
                ];
            else:
                $arrTrafico = [
                    "siteviews_views" => $this->traffic['siteviews_views'] + 1,
                    "siteviews_pages" => $this->traffic['siteviews_pages'] + 1
                ];
            endif;
            $updateSiteViews = new Update();
            $updateSiteViews->ExeUpdate('ws_siteviews', $arrTrafico, "WHERE siteviews_date = :date", "date={$this->data}");
        endif;
    }

    //atualiza so o pageviews.
    private function trafficUpdate() {
        $this->getTrafico();
        $arrTrafico = ["siteviews_pages" => $this->traffic['siteviews_pages'] + 1];
        $updatePageViews = new Update();
        $updatePageViews->ExeUpdate('ws_siteviews', $arrTrafico, "WHERE siteviews_date = :date", "date={$this->data}");

        $this->traffic = null;
    }

    //obtem resultados da tabela.
    private function getTrafico() {
        $readSiteViews = new Read();
        $readSiteViews->ExeRead('ws_siteviews', "WHERE siteviews_date = :date", "date={$this->data}");
        if ($readSiteViews->getRowCount()):
            $this->traffic = $readSiteViews->getResult()[0];
        endif;
    }

    //verifica cria e atualiza cookie do usuario.
    private function getCookie() {
        $cookie = filter_input(INPUT_COOKIE, 'useronline', FILTER_DEFAULT);
        //cria o cookie.
        setcookie("useronline", base64_encode("upinside"), time() + 86400);
        if (!$cookie):
            return false;
        else:
            return true;
        endif;
    }

    //identifica o browser
    private function checkBrowser() {
        $this->browser = $_SESSION['useronline']['online_agent'];
        //STRPOS verifica se existe a palavra.
        if (strpos($this->browser, 'Chrome')):
            $this->browser = 'Google Chrome';
        elseif (strpos($this->browser, 'Firefox')):
            $this->browser = 'Mozila Firefox';
        else:
            $this->browser = 'Outros';
        endif;
    }

    //Atualiza o browser.
    private function updateBrowser() {
        $readAgent = new Read();
        $readAgent->ExeRead('ws_siteviews_agent', "WHERE agent_name = :agent", "agent={$this->browser}");
        if (!$readAgent->getResult()):
            $arrAgent = ['agent_name' => $this->browser, 'agent_views' => 1];
            $creatAgent = new Create();
            $creatAgent->ExeCreate('ws_siteviews_agent', $arrAgent);
        else:
            $arrAgent = ['agent_views' => $readAgent->getResult()[0]['agent_views'] + 1];
            $updateAgent = new Update();
            $updateAgent->ExeUpdate('ws_siteviews_agent', $arrAgent, "WHERE agent_name = :name", "name={$this->browser}");
        endif;
    }

    //cria o usuario.
    private function setUsuario() {
        $sessionOnline = $_SESSION['useronline'];
        $sessionOnline['agent_name'] = $this->browser;

        $createUser = new Create();
        $createUser->ExeCreate('ws_siteviews_online', $sessionOnline);
    }

    //atualiza o usuario
    private function updateUsuario() {
        $arrSessionOnline = [
            'online_endview' => $_SESSION['useronline']['online_endview'],
            "online_url" => $_SESSION['useronline']['online_url']
        ];

        $update = new Update();
        $update->ExeUpdate('ws_siteviews_online', $arrSessionOnline, "WHERE online_session = :ses", "ses={$_SESSION['useronline']['online_session']}");

        if (!$update->getRowCount()):
            $read = new Read();
            $read->ExeRead('ws_siteviews_online', "WHERE online_session = :onses", "onses={$_SESSION['useronline']['online_session']}");
            if (!$read->getRowCount()):
                $this->setUsuario();
            endif;
        endif;
    }

}
