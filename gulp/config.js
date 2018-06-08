'use strict';

const YAML = require('js-yaml');
const fs = require('fs');

const config  = YAML.safeLoad(fs.readFileSync('config.yml', 'utf8'));

module.exports = {
  config: config
}