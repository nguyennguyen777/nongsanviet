<?php

if (!function_exists('locale_url')) {
    /**
     * Tạo URL với locale prefix
     *
     * @param string $path
     * @param string|null $locale
     * @return string
     */
    function locale_url($path = '', $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $path = ltrim($path, '/');
        
        // Nếu path đã có locale, thay thế nó
        $path = preg_replace('#^(vi|en|zh)/#', '', $path);
        
        return url('/' . $locale . ($path ? '/' . $path : ''));
    }
}

if (!function_exists('current_locale')) {
    /**
     * Lấy locale hiện tại
     *
     * @return string
     */
    function current_locale()
    {
        return app()->getLocale();
    }
}

if (!function_exists('locale_route')) {
    /**
     * Tạo route với locale tự động
     *
     * @param string $name
     * @param array $parameters
     * @param bool $absolute
     * @return string
     */
    function locale_route($name, $parameters = [], $absolute = true)
    {
        $locale = app()->getLocale();
        
        // Nếu route yêu cầu locale parameter, thêm vào
        if (!isset($parameters['locale'])) {
            $parameters['locale'] = $locale;
        }
        
        return route($name, $parameters, $absolute);
    }
}

