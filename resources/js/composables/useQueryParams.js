import { ref } from 'vue';
import _ from 'lodash';

export const useQueryParams = () => {
  const urlParams = new URLSearchParams(window.location.search);
  console.log('urlParams', urlParams);
  const queryParams = ref({});
  for (const [key, value] of urlParams) {
    queryParams.value[key] = value;
  }

  const onChangeQueryParams = (paramsArg) => {
    const params = _.cloneDeep(paramsArg);
    console.log('>>> params', params);
    const searchParams = new URLSearchParams(window.location.search);
    for (const key in params) {
      const val = params[key];
      if (typeof val === 'number') {
        if (_.isNil(val)) searchParams.delete(key);
        else searchParams.set(key, val);
      } else {
        if (_.isEmpty(val)) searchParams.delete(key);
        else searchParams.set(key, val);
      }
    }

    queryParams.value = params;

    const newUrl = searchParams.toString()
      ? `${window.location.pathname}?${searchParams.toString()}`
      : window.location.pathname;
    window.history.replaceState({}, '', newUrl);
  };

  return {
    queryParams,
    onChangeQueryParams,
  };
};
