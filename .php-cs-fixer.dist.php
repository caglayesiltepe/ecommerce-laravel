<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/app')      // Uygulama dosyalarını kontrol et
    ->in(__DIR__.'/routes')   // Routes dosyalarını kontrol et
    ->in(__DIR__.'/database'); // Database dosyalarını kontrol et;

    return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,                           // PSR-12 stil rehberi
        'align_multiline_comment' => true,          // Çok satırlı yorumları hizalar
        'array_syntax' => ['syntax' => 'short'],    // Kısa array sözdizimi
        'no_trailing_whitespace' => true,           // Satır sonu boşlukları kaldırır
      //  'declare_strict_types' => true,             // strict_types bildirimi ekler
        'function_typehint_space' => true,          // Fonksiyon tipi ipuçlarına boşluk ekler
        'no_unused_imports' => true,                // Kullanılmayan `use` ifadelerini kaldırır
       // 'single_blank_line_before_namespace' => true, // Namespace öncesinde tek boşluk bırakır
        'phpdoc_add_missing_param_annotation' => true, // Eksik @param açıklamalarını ekler
    ])
    ->setUsingCache(false)
    ->setFinder($finder);
