# Changelog

## 0.1.0 (2026-05-13)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/phoebe-bird/phoebe-php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types
* improve identifier renaming for names that clash with builtins
* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([27fe977](https://github.com/phoebe-bird/phoebe-php/commit/27fe977361c716545ff1870b94f6a47f6586a90c))
* add idempotency header support ([61d64f7](https://github.com/phoebe-bird/phoebe-php/commit/61d64f7fd7f38c95e028d5be9eadb7cc636aad66))
* allow both model class instances and arrays in setters ([8d99d9e](https://github.com/phoebe-bird/phoebe-php/commit/8d99d9eb5237f5eda5a52b26c4f7c4ff1ddb2c22))
* **api:** manual updates ([1e1335c](https://github.com/phoebe-bird/phoebe-php/commit/1e1335c8d3d179ed6ff607610fec0d907144d26e))
* **api:** manual updates ([e32a040](https://github.com/phoebe-bird/phoebe-php/commit/e32a040ac3e106b4fe2298589580f45dc7ea5ac6))
* improve identifier renaming for names that clash with builtins ([071c91b](https://github.com/phoebe-bird/phoebe-php/commit/071c91b5dc3c90413fe22a7a0652c008278c94ba))
* improved phpstan type annotations ([8c7e4ea](https://github.com/phoebe-bird/phoebe-php/commit/8c7e4ead947f0eaca8c96e2d776082b84e9571d4))
* replace special flag type `omittable` with just `null` ([2642fc2](https://github.com/phoebe-bird/phoebe-php/commit/2642fc20fbd6dd2889bd438ffa0df7cf37135b9a))
* simplify and make the phpstan types more consistent ([c13764c](https://github.com/phoebe-bird/phoebe-php/commit/c13764c89a930982f9d951ed71d19bc5e2099f6d))
* split out services into normal & raw types ([119e369](https://github.com/phoebe-bird/phoebe-php/commit/119e369b7902bc4eae759b5f7ad55a8a29076bad))
* support unwrapping envelopes ([57dc1fd](https://github.com/phoebe-bird/phoebe-php/commit/57dc1fdc5ba1ceb2e9916b4ec7d97e9185f353ac))
* use aliases for phpstan types ([8bf4765](https://github.com/phoebe-bird/phoebe-php/commit/8bf4765b746e0da93ff1ccd2b8e29012c6086351))
* use camel casing for all class properties ([ea59222](https://github.com/phoebe-bird/phoebe-php/commit/ea59222714eadac5cb4b215c0c88e18bf5cd5048))


### Bug Fixes

* a number of serialization errors ([7c5b491](https://github.com/phoebe-bird/phoebe-php/commit/7c5b491f5cfbf19c70edd25ef4deb22f545612d0))
* correctly serialize dates ([e0e28b5](https://github.com/phoebe-bird/phoebe-php/commit/e0e28b5b5fb874d086473e31e084fec7dc3320f5))
* support arrays in query param construction ([9297d26](https://github.com/phoebe-bird/phoebe-php/commit/9297d2655e0ff4759004cba924e8e83734433ad7))
* typos in README.md ([d621dde](https://github.com/phoebe-bird/phoebe-php/commit/d621dde18134ee114218d3c843779b3fbe40c149))


### Chores

* add git attributes and composer lock file ([737ad92](https://github.com/phoebe-bird/phoebe-php/commit/737ad920c7984fb0c9a53b55e4ded937054028bd))
* be more targeted in suppressing superfluous linter warnings ([10daca0](https://github.com/phoebe-bird/phoebe-php/commit/10daca04e1a1322c72802dc602535b6beffe95dc))
* configure new SDK language ([c25bbe7](https://github.com/phoebe-bird/phoebe-php/commit/c25bbe70272169cb4ef4823f1e47f44700d3df01))
* ensure constant values are marked as optional in array types ([04b7df0](https://github.com/phoebe-bird/phoebe-php/commit/04b7df057293bfc08e3e395b8dcd8ba182943143))
* fix typo in descriptions ([8e85ea5](https://github.com/phoebe-bird/phoebe-php/commit/8e85ea54b6f43f8d26790eb5ef6d93e1bd4b1837))
* formatting ([50077bc](https://github.com/phoebe-bird/phoebe-php/commit/50077bcf74eb37b5d2c413bfd5354f23b1eb7b46))
* **internal:** add a basic client test ([8255f87](https://github.com/phoebe-bird/phoebe-php/commit/8255f87d9652c77868f7496f409363377a177800))
* **internal:** codegen related update ([878ca2f](https://github.com/phoebe-bird/phoebe-php/commit/878ca2fb4b9659b1a95c2985e9f142f2fbe16b3d))
* **internal:** codegen related update ([85e7dcd](https://github.com/phoebe-bird/phoebe-php/commit/85e7dcd9b36fff8f5d19b0d6b2dd3787bcaf08bd))
* **internal:** codegen related update ([49aef32](https://github.com/phoebe-bird/phoebe-php/commit/49aef32f341ebc37e1055cfa0fe07af91403a026))
* **internal:** codegen related update ([c010188](https://github.com/phoebe-bird/phoebe-php/commit/c010188c5c4d5ff9511b1864957d8f53eaaa1a72))
* **internal:** codegen related update ([b8a9ce6](https://github.com/phoebe-bird/phoebe-php/commit/b8a9ce6b431f17880de6f2f2179bab10489a77bf))
* **internal:** codegen related update ([e87092b](https://github.com/phoebe-bird/phoebe-php/commit/e87092b53813bc3cf22190e16944dc31d7758589))
* **internal:** codegen related update ([586d74c](https://github.com/phoebe-bird/phoebe-php/commit/586d74c11d2d6a85f12f50b825427d12111c71e2))
* **internal:** codegen related update ([b1f707c](https://github.com/phoebe-bird/phoebe-php/commit/b1f707cc9b9d88d1bd1e33aac24916b0cd7698fa))
* **internal:** codegen related update ([5a523ad](https://github.com/phoebe-bird/phoebe-php/commit/5a523ad13edc67f8581883663dbb9e8d5d7bfdc6))
* **internal:** codegen related update ([ed76581](https://github.com/phoebe-bird/phoebe-php/commit/ed76581684915437130fe0fa6e2ac146098d119e))
* **internal:** codegen related update ([0e0ecda](https://github.com/phoebe-bird/phoebe-php/commit/0e0ecdac6aee5dec71242c0f12c568f30dbb4e58))
* **internal:** codegen related update ([3f410e4](https://github.com/phoebe-bird/phoebe-php/commit/3f410e413b3963e737d7579c9f07ad3279ce994b))
* **internal:** codegen related update ([e1bcdc0](https://github.com/phoebe-bird/phoebe-php/commit/e1bcdc0d0200532c13e7c7921d171ae9fb1e3880))
* **internal:** codegen related update ([4d50fb2](https://github.com/phoebe-bird/phoebe-php/commit/4d50fb2f52974ec521903cd71028711a1563827e))
* **internal:** codegen related update ([f302ac6](https://github.com/phoebe-bird/phoebe-php/commit/f302ac6c507785ecc3aa1c418e1cc5a9412f043b))
* **internal:** codegen related update ([0ebad57](https://github.com/phoebe-bird/phoebe-php/commit/0ebad57b8d5a2005d919a8f04353974b8718278d))
* **internal:** codegen related update ([79999d8](https://github.com/phoebe-bird/phoebe-php/commit/79999d884c1c78761849ab6e3bb5f7a00f027901))
* **internal:** codegen related update ([f5f6fcb](https://github.com/phoebe-bird/phoebe-php/commit/f5f6fcb998a44c9716c7561bb0658bc770146735))
* **internal:** codegen related update ([c4472f3](https://github.com/phoebe-bird/phoebe-php/commit/c4472f36d39d177e0cd52d6f00c64b482eb50c8e))
* **internal:** codegen related update ([3edf9d3](https://github.com/phoebe-bird/phoebe-php/commit/3edf9d310767746ba6b113c2df44f99f279e0172))
* **internal:** codegen related update ([ecefdfb](https://github.com/phoebe-bird/phoebe-php/commit/ecefdfbf7f36edaa5f2eeb25d17a0b0d03798614))
* **internal:** codegen related update ([63aa162](https://github.com/phoebe-bird/phoebe-php/commit/63aa162496efd9975005887b6ffe9aa89461d763))
* **internal:** codegen related update ([1a22c2c](https://github.com/phoebe-bird/phoebe-php/commit/1a22c2ca3b80d8d548c2e10a8008a4a5109a72f0))
* **internal:** codegen related update ([35ce50f](https://github.com/phoebe-bird/phoebe-php/commit/35ce50f202e381748a5d3d9da65b637de3ced459))
* **internal:** codegen related update ([ff72234](https://github.com/phoebe-bird/phoebe-php/commit/ff722344ea6d43ba6ee1fffe23a80c2207d5df5e))
* **internal:** codegen related update ([8b286c7](https://github.com/phoebe-bird/phoebe-php/commit/8b286c7b7972a60f9de78319cdeb8846bd98cf5b))
* **internal:** codegen related update ([c406470](https://github.com/phoebe-bird/phoebe-php/commit/c4064706f204f57f39c8f5eab0102224451b18de))
* **internal:** codegen related update ([20954c5](https://github.com/phoebe-bird/phoebe-php/commit/20954c5b64a8c7b65b6e86540bacd9685a48e0cc))
* **internal:** codegen related update ([c595ab2](https://github.com/phoebe-bird/phoebe-php/commit/c595ab26707415df5fac7a649a88a62c127712d8))
* **internal:** minor test script reformatting ([76c5c1b](https://github.com/phoebe-bird/phoebe-php/commit/76c5c1b5710db8230d5ee9618c9338e7e62d5a9c))
* **internal:** refactor auth by moving concern from base client into client ([484805d](https://github.com/phoebe-bird/phoebe-php/commit/484805d3e1ab31dd5df89df1fc4e81ec5423c57d))
* **internal:** update `actions/checkout` version ([c0049b5](https://github.com/phoebe-bird/phoebe-php/commit/c0049b55300902c2a597690d72d0341a5b7fb0ed))
* **internal:** update phpstan comments ([1d638b6](https://github.com/phoebe-bird/phoebe-php/commit/1d638b65c81fc86dba63fe9270e1b6aee8585c9b))
* **readme:** remove beta warning now that we're in ga ([b47fc4c](https://github.com/phoebe-bird/phoebe-php/commit/b47fc4cdc366f19c03c0fad757105c5fe8115cee))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([638fcbb](https://github.com/phoebe-bird/phoebe-php/commit/638fcbb1af6f7aa1172ca71ccbc6cf573f3c349a))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([115467b](https://github.com/phoebe-bird/phoebe-php/commit/115467b44e653b89cc1f84e09a7657f13de99ae9))
* use non-trivial test assertions ([3c2bdc5](https://github.com/phoebe-bird/phoebe-php/commit/3c2bdc5b1fe5fe560767f353df4b74ceac6cac48))
* use single quote strings ([1fbab11](https://github.com/phoebe-bird/phoebe-php/commit/1fbab112085c1d772685d039af55382155d39578))
