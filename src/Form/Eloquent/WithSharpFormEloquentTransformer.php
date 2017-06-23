<?php

namespace Code16\Sharp\Form\Eloquent;

use Closure;
use Code16\Sharp\Form\Eloquent\Transformers\EloquentFormTagsTransformer;
use Code16\Sharp\Utils\Transformers\WithCustomTransformers;

trait WithSharpFormEloquentTransformer
{
    use WithCustomTransformers;

    /**
     * @param string $attribute
     * @param string|Closure $labelAttribute
     * @param string $idAttribute
     * @return $this
     */
    function setTagsTransformer(string $attribute, $labelAttribute, $idAttribute = "id")
    {
        $this->transformers[$attribute] = new EloquentFormTagsTransformer(
            $labelAttribute, $idAttribute
        );

        return $this;
    }

    /**
     * Retrieve a Model for the form and pack all its data as JSON.
     *
     * @param $model
     * @return array
     */
    function transform($model): array
    {
        return $this->applyTransformers(
            collect($this->getFieldKeys()), $model, $model->toArray()
        );
    }
}