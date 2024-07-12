<template>
  <div class="v-autocomplete">
    <div class="v-autocomplete-input-group" :class="{ 'v-autocomplete-selected': value }">
      <input type="search" v-model="searchText" v-bind="inputAttrs"
             :class="inputAttrs.class || inputClass"
             :placeholder="inputAttrs.placeholder || placeholder"
             :disabled="inputAttrs.disabled || disabled"
             @blur="blur" @focus="focus" @input="inputChange"
             @keyup.enter="keyEnter" @keydown.tab="keyEnter"
             @keydown.up="keyUp" @keydown.down="keyDown">
    </div>
    <div class="v-autocomplete-list" v-if="show">
      <div class="v-autocomplete-list-item" v-for="(item, i) in internalItems" :key="i" @click="onClickItem(item)"
           :class="{ 'v-autocomplete-item-active': i === cursor }" @mouseover="cursor = i">
        <component :is="componentItem" :item="item" :searchText="searchText"></component>
      </div>
    </div>
  </div>
</template>

<script>
import {ref, reactive, computed, watch, onMounted} from 'vue';
import Item from './Item.vue';
import utils from './utils.js';

export default {
  name: 'VAutocomplete',
  props: {
    componentItem: {default: () => Item},
    minLen: {type: Number, default: utils.minLen},
    wait: {type: Number, default: utils.wait},
    value: null,
    getLabel: {
      type: Function,
      default: item => item
    },
    items: Array,
    autoSelectOneItem: {type: Boolean, default: true},
    placeholder: String,
    inputClass: {type: String, default: 'v-autocomplete-input'},
    disabled: {type: Boolean, default: false},
    inputAttrs: {type: Object, default: () => ({})},
    keepOpen: {type: Boolean, default: false},
    initialLocation: {type: String, default: null}
  },
  setup(props, {emit}) {
    let searchText = ref('');
    if (props.initialLocation) {
      searchText = ref(props.initialLocation);
    }

    const showList = ref(false);
    const cursor = ref(-1);
    const internalItems = ref(props.items || []);

    const hasItems = computed(() => !!internalItems.value.length);
    const show = computed(() => (showList.value && hasItems.value) || props.keepOpen);

    const inputChange = () => {
      showList.value = true;
      cursor.value = -1;
      onSelectItem(null, 'inputChange');
      utils.callUpdateItems(searchText.value, updateItems);
      emit('change', searchText.value);
    };

    const updateItems = () => {
      emit('update-items', searchText.value);
    };

    const focus = () => {
      emit('focus', searchText.value);
      showList.value = true;
    };

    const blur = () => {
      emit('blur', searchText.value);
      setTimeout(() => (showList.value = false), 200);
    };

    const onClickItem = item => {
      onSelectItem(item);
      emit('item-clicked', item);
    };

    const onSelectItem = item => {
      if (item) {
        internalItems.value = [item];
        searchText.value = props.getLabel(item);
        emit('item-selected', item);
      } else {
        setItems(props.items);
      }
      emit('input', item);
    };

    const setItems = items => {
      internalItems.value = items || [];
    };

    const isSelectedValue = value => {
      return internalItems.value.length === 1 && value === internalItems.value[0];
    };

    const keyUp = () => {
      if (cursor.value > -1) {
        cursor.value--;
        itemView(document.getElementsByClassName('v-autocomplete-list-item')[cursor.value]);
      }
    };

    const keyDown = () => {
      if (cursor.value < internalItems.value.length) {
        cursor.value++;
        itemView(document.getElementsByClassName('v-autocomplete-list-item')[cursor.value]);
      }
    };

    const itemView = item => {
      if (item && item.scrollIntoView) {
        item.scrollIntoView(false);
      }
    };

    const keyEnter = () => {
      if (showList.value && internalItems.value[cursor.value]) {
        onSelectItem(internalItems.value[cursor.value]);
        showList.value = false;
      }
    };

    watch(() => props.items, newValue => {
      setItems(newValue);
      const item = utils.findItem(props.items, searchText.value, props.autoSelectOneItem);
      if (item) {
        onSelectItem(item);
        showList.value = false;
      }
    });

    watch(() => props.value, newValue => {
      if (!isSelectedValue(newValue)) {
        onSelectItem(newValue);
        searchText.value = props.getLabel(newValue);
      }
    });

    onMounted(() => {
      utils.minLen = props.minLen;
      utils.wait = props.wait;
      onSelectItem(props.value);
    });

    return {
      searchText,
      showList,
      cursor,
      internalItems,
      hasItems,
      show,
      inputChange,
      updateItems,
      focus,
      blur,
      onClickItem,
      onSelectItem,
      setItems,
      isSelectedValue,
      keyUp,
      keyDown,
      itemView,
      keyEnter
    };
  }
};
</script>

<style>
.v-autocomplete {
  position: relative;
}

.v-autocomplete .v-autocomplete-list {
  position: absolute;
}

.v-autocomplete .v-autocomplete-list .v-autocomplete-list-item {
  cursor: pointer;
}

.v-autocomplete .v-autocomplete-list .v-autocomplete-list-item.v-autocomplete-item-active {
  background-color: #f3f6fa;
}
</style>
