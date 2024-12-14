<?php

namespace App\Factory;

use App\Entity\Note;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Note>
 */
final class NoteFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Note::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'etudiant' => EtudiantFactory::randomOrCreate(), // TODO add App\Entity\etudiant type manually
            'module' => ModuleFactory::randomOrCreate(), // TODO add App\Entity\module type manually
            'note' => self::faker()->randomFloat(),
            'observation' => self::faker()->realText(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Note $note): void {})
        ;
    }
}