<?php

namespace Code16\Sharp\EntityList;

use Code16\Sharp\Utils\Filters\ListFilter;
use Code16\Sharp\Utils\Filters\ListRangeFilter;
use Code16\Sharp\Utils\Filters\ListMultipleFilter;
use Code16\Sharp\Utils\Filters\ListRequiredFilter;

interface EntityListFilter extends ListFilter
{
}

interface EntityRangeFilter extends ListRangeFilter
{
}

interface EntityListMultipleFilter extends ListMultipleFilter
{
}

interface EntityListRequiredFilter extends ListRequiredFilter
{
}