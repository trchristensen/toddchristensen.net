export function convertToF(celsius: number) {
  return (celsius * 9) / 5 + 32;
}

// NOTE: The functionality below will soon become part of Contentlayer.
export const pick = (obj, keys) => {
  return keys.reduce((acc, key) => {
    acc[key] = obj[key];
    return acc;
  }, {});
};


export function BigIntToString(obj: Object) {
  return JSON.stringify(obj, (_, v) => (typeof v === "bigint" ? v.toString() : v));
}