<?php

/**
 * Site metadata configuration and description generator.
 *
 * Stores site metadata as an associative array and provides
 * a utility to generate a short descriptive text.
 */

// -------------------------------------------------------------------
// 1. Site metadata configuration
// -------------------------------------------------------------------
$siteMeta = [
    'site_name'        => '爱游戏',
    'site_url'         => 'https://mcn-aiyouxi.com.cn',
    'site_language'    => 'zh-CN',
    'description'      => '爱游戏致力于提供优质游戏资讯与互动体验。',
    'keywords'         => ['爱游戏', '游戏', '娱乐', '互动'],
    'author'           => 'GameTeam',
    'year'             => 2025,
    'version'          => '1.0.0',
];

// -------------------------------------------------------------------
// 2. Helper function: generate a short description for the site
// -------------------------------------------------------------------

/**
 * Generates a brief descriptive text using the provided metadata array.
 * The output is safely escaped for HTML context.
 *
 * @param array $meta  Associative array with keys: site_name, site_url, description, keywords, etc.
 * @return string      Plain-text description (safe for HTML).
 */
function generateSiteDescription(array $meta): string
{
    // Extract values with fallbacks
    $name        = $meta['site_name'] ?? 'Unnamed Site';
    $url         = $meta['site_url'] ?? '';
    $desc        = $meta['description'] ?? '';
    $keywords    = $meta['keywords'] ?? [];

    // Build a short summary
    $parts = [];

    if (!empty($name)) {
        $parts[] = $name;
    }

    if (!empty($desc)) {
        $parts[] = $desc;
    }

    if (!empty($keywords)) {
        // Join keywords, take up to 5
        $kwList = array_slice($keywords, 0, 5);
        $parts[] = '关键词：' . implode('、', $kwList);
    }

    if (!empty($url)) {
        $parts[] = '官网：' . $url;
    }

    $rawDescription = implode(' — ', $parts);

    // HTML-escape the output for safety
    return htmlspecialchars($rawDescription, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// -------------------------------------------------------------------
// 3. Example usage
// -------------------------------------------------------------------

$shortDescription = generateSiteDescription($siteMeta);

// For demo purposes, output the description (e.g. in a welcome block)
echo $shortDescription;

// Optional: you could also access individual metadata
// echo $siteMeta['site_name'];

?>