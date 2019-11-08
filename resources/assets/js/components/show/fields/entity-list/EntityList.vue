<template>
    <SharpEntityList
        :entity-key="entityListKey"
        :module="storeModule"
        :show-create-button="showCreateButton"
        :show-reorder-button="showReorderButton"
        :show-search-field="showSearchField"
        :hidden-commands="hiddenCommands"
        inline
    >
        <template slot="action-bar" slot-scope="{ props, listeners }">
            <ActionBar v-bind="props" v-on="listeners" />
        </template>
    </SharpEntityList>
</template>

<script>
    import EntityListModule from '../../../../store/modules/entity-list';
    import SharpEntityList from "../../../list/EntityList";
    import ActionBar from "./ActionBar";
    import { getFiltersQueryParams } from "../../../../util/filters";

    export default {
        props: {
            entityListKey: String,
            showCreateButton: Boolean,
            showReorderButton: Boolean,
            showSearchField: Boolean,
            hiddenFilters: Object,
            hiddenCommands: Object,
        },
        components: {
            SharpEntityList,
            ActionBar,
        },
        computed: {
            storeModule() {
                return `show/entity-lists/${this.entityListKey}`;
            },
        },
        created() {
            this.$store.registerModule(this.storeModule.split('/'), EntityListModule);
            this.$store.dispatch(`${this.storeModule}/setQuery`, getFiltersQueryParams(this.hiddenFilters));
        },
    }
</script>