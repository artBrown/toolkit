/**
 * @copyright   2010-2017, The Titon Project
 * @license     http://opensource.org/licenses/BSD-3-Clause
 * @link        http://titon.io
 */

import { Children } from 'react';
import invariant from '../utility/invariant';

/**
 * A function that will validate that all children of a component are of a specific type.
 *
 * @param {...*} types
 * @returns {Function}
 */
export default function childrenOf(...types) {
  const components = new WeakSet();
  const tags = new Map();

  types.forEach((type) => {
    // HTML tags
    if (typeof type === 'string') {
      tags.set(type, type);

    // React components
    } else {
      components.add(type);
    }
  });

  return function childrenPropType(props, propName, componentName) {
    try {
      Children.forEach(props[propName], (child) => {
        let passed = false;
        let type = child.type;

        if (typeof type === 'string') {
          passed = tags.has(type);
        } else {
          passed = components.has(type);
          type = type.name;
        }

        invariant(passed, '`%s` does not allow children of type `%s`.', componentName, type);
      });
    } catch (e) {
      return e;
    }

    return null;
  };
}
