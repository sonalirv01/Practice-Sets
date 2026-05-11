<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Trie is a tree for efficient prefix-based string operations.

When to Use:
- Autocomplete and dictionary prefix search.
- Many startsWith/prefix queries.
Time Complexity:
- Insert/Search/Prefix: O(L)

Space Complexity:
- O(total characters inserted)

Avoid When:
- Very small word set where plain array search is enough.
*/

class TrieNode
{
    public array $children = [];
    public bool $isEnd = false;
}

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    public function insert(string $word): void
    {
        $node = $this->root;

        foreach (str_split($word) as $char) {
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }

        $node->isEnd = true;
    }

    public function search(string $word): bool
    {
        $node = $this->walk($word);
        return $node !== null && $node->isEnd;
    }

    public function startsWith(string $prefix): bool
    {
        return $this->walk($prefix) !== null;
    }

    private function walk(string $s): ?TrieNode
    {
        $node = $this->root;

        foreach (str_split($s) as $char) {
            if (!isset($node->children[$char])) {
                return null;
            }
            $node = $node->children[$char];
        }

        return $node;
    }
}

$trie = new Trie();
$trie->insert('apple');
$trie->insert('app');

echo 'search(app): ' . ($trie->search('app') ? 'true' : 'false') . PHP_EOL;
echo 'startsWith(ap): ' . ($trie->startsWith('ap') ? 'true' : 'false') . PHP_EOL;
echo 'search(ap): ' . ($trie->search('ap') ? 'true' : 'false') . PHP_EOL;
