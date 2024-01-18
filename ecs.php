<?php declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use SlevomatCodingStandard\Sniffs\Classes\TraitUseSpacingSniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths(
        [
            __DIR__.'/config',
            __DIR__.'/public',
            __DIR__.'/src',
            __DIR__.'/tests',
        ]
    );

    $ecsConfig->rules(
        [
            NoUnusedImportsFixer::class,
            DeclareStrictTypesFixer::class
        ]
    );

    $ecsConfig->ruleWithConfiguration(
        TraitUseSpacingSniff::class,
        [
            'linesCountBeforeFirstUse' => 0,
        ]
    );

    $ecsConfig->sets(
        [
            SetList::SPACES,
            SetList::ARRAY,
            SetList::DOCBLOCK,
            SetList::NAMESPACES,
            SetList::COMMENTS,
            SetList::SYMPLIFY,
            SetList::COMMON,
            SetList::CLEAN_CODE,
            SetList::PSR_12,
            SetList::PHPUNIT,
        ]
    );
};
