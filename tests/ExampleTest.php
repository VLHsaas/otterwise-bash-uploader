<?php

beforeEach(function () {
    // Mock GitHub Actions environment
    putenv('GITHUB_ACTIONS=true');
    putenv('GITHUB_RUN_ID=123');
    putenv('GITHUB_RUN_NUMBER=456');
    putenv('GITHUB_BASE_REF=main');
    putenv('GITHUB_HEAD_REF=feature-branch');
    putenv('GITHUB_REPOSITORY=user/repo');
});

it('returns an error if unable to find file', function(){
    $output = shell_exec('bash uploader.sh --file tests/unexisting-file.xml');
    $this->assertStringContainsString("Passed --file 'tests/unexisting-file.xml' does not exist.", $output);
});
